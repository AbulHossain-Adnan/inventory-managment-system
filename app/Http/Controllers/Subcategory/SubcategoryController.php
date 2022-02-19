<?php

namespace App\Http\Controllers\Subcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\SubcategoryRequest;


class SubcategoryController extends Controller
{
    
    public function index()
    {
        return view('subcategory/index',['subcategories'=>Subcategory::orderBy('id','desc')->paginate(4)]);
    }

  
    public function create()
    {
        return view('subcategory/create',['categories'=>Category::all()]);
    }


    public function store(SubcategoryRequest $request)
    {
        Subcategory::create($request->all());
          toastr()->success('SubCategory Created succesfully');
          return redirect()->route('sub_category.index');
    }



    public function edit($id)
    {
        return view('subcategory/edit',['subcategory'=>Subcategory::findOrFail($id)]);
    }


    public function update(SubcategoryRequest $request, $id)
    {
        Subcategory::findOrFail($id)->update($request->all());
         toastr()->success('SubCategory updated succesfully');
        return redirect()->route('sub_category.index');
    }

    public function destroy($id)
    {
        Subcategory::findOrFail($id)->delete();
         toastr()->success('SubCategory deleted succesfully');
        return back();
    }
}
