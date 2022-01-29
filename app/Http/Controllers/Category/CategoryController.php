<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use DataTables;
use DB;


class CategoryController extends Controller
{
    
    public function index(Request $request)
    {

                if ($request->ajax()) {

                     $data = Category::select(['id', 'name', 'title', 'created_at', 'updated_at']);
                    
                   

            return Datatables::of($data) 
            ->filter(function ($query) use ($request) {
              
                    $keyword=$request->keyword;
                        if ($request->keyword) {
                            $query->where('name', 'like', "%{$keyword}%");
                        }
                        
                        if($request->number == "only"){
                            $query->where('name','REGEXP',"[0-9]");
                        }
                        if($request->number == "mixed"){
                            $query->where('name','REGEXP',"[a-z|0-9]");
                        }
                        if($request->dash == "yes"){
                            $query->where('name','REGEXP',"[-]");
                        }

                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }

       
        return view('category/index',
            ['categories'=>Category::orderBy('id','desc')->paginate(4)
        ]);
        
    }


 
    public function create()
    {
        return view('category/create');
    }


    public function store(CategoryRequest $request)
    {

        Category::create($request->all());
        toastr()->success('Category Created succesfully');
          return redirect()->route('category.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        return view('category/edit',['category'=>Category::findOrFail($id)]);
    }


    public function update(CategoryRequest $request, $id)
    {
        $data=Category::findOrFail($id)->update($request->all());
         toastr()->success('Category updated succesfully');
        return redirect()->route('category.index');
    }

  
   
    public function destroy($id)
    {

        Category::findOrFail($id)->delete();
          toastr()->success('Category deleted succesfully');
        return back();
    }
}
