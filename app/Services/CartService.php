<?php 
namespace App\Services;
use App\Models\Product;
use Cart;

 class CartService{

 	public function addtocart($id){
	    $product=Product::findOrFail($id);
        $data=array();
        $data['id']=$product->id;
        $data['name']=$product->name;
        $data['qty']=1;
        $data['price']=$product->price;
        $data['weight']=1;;
        cart::add($data);

}
public function cartdata(){
	 $data=Cart::content();
	 return $data;
}
public function cartremove($rowId){
	  Cart::remove($rowId);
	 
}
public function increment($rowId){
	  $row=Cart::get($rowId);
    Cart::update($rowId, $row->qty +1);
	 
}

public function decrement($id){
	  $row=Cart::get($id);
    Cart::update($id, $row->qty +1);
	 
}


 }


?>