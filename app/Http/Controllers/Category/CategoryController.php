<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    
    public function index()
    {
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
