<?php
namespace App\Services;
use App\Models\Product;
use Illuminate\Http\Request;

Class productservice{

	public function handle(Request $request){
		
 $data= new Product();
         $category_id=$request->category_id;
        $category_id_count=count($category_id);
        $data= new Product();
        $data->name=$request->name;
        $data->min_qty=$request->min_qty;
        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->subcategory_id=$request->subcategory_id;
        if($request->hasfile('image')){
            $image=array();
            if($files = $request->file('image')){
                foreach ($files as $key => $file) {
                    $image_name= hexdec(uniqid());
                    $extension=strtolower($file->getClientOriginalExtension());
                    $image_full_name=$image_name.'.'.$extension;
                    $file->move(public_path('product_images/'),$image_full_name);
                    $image[]=$image_full_name;
                   
                }
            }

           $data->image=implode('|', $image);
           if($category_id_count > 0){
           $data->category_id=implode(',',$category_id);
           }

                      return $data;


	}
}

}

