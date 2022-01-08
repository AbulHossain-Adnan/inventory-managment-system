<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use DB;




class ProductController extends Controller
{
   protected $productservice;

   public function __construct(ProductService $productservice){
    $this->productservice=$productservice;
   }



    public function index()
    {
        return view('product/index',[
            'products'=>Product::paginate(4)
        ]);
    }

 
    public function create()
    {
        return view('product/create',[
            'categories'=>Category::all(),
            'subcategories'=>Subcategory::all(),
        ]);
    }

   
    public function store(ProductRequest $request)
    { 
       
        $this->productservice->handle($request)->save();
            toastr()->success('Product Created succesfully');
           return redirect()->route('product.index');
          
        }
    
    public function edit($id)
    {
      return view('product/edit',[
            'product'=>Product::findOrFail($id),
            'categories'=>Category::all(),
            'subcategories'=>Subcategory::all(),
        ]);
    }

  
    public function update(ProductRequest $request, $id)
    {
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
         toastr()->success('Product deleted succesfully');
        return back();
    }
}
