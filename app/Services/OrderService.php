<?php
namespace App\Services;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\User;
use App\Events\StockLowAlertEvent;
use Carbon\Carbon;
use Cart;


class OrderService{
	public function orderstore(Request $Request){
    
  
          $order_id=Order::insertGetId([
      'customer_id'=>$Request->customer_id,
      'subtotal'=>cart::subtotal(),
      'date'=>carbon::now()
 ]);

 foreach (cart::content() as $value) {
      Order_detail::insert([
        'order_id'=>$order_id,
        'product_id'=>$value->id,
        'product_name'=>$value->name,
        'product_price'=>$value->price,
        'product_quantity'=>$value->qty,
        'customer_id'=>$Request->customer_id,
        'created_at'=>carbon::now(),



 ]);
   $productd=Product::where('id',$value->id)->first();
  
   $productd->update(['quantity'=>$productd->quantity-$value->qty]);  

Cart::destroy();

 }

    
   


 $products=Product::where('quantity','<',5)->get();

// $user=User::first();
foreach( $products as $product){

   event(new StockLowAlertEvent($product));

}




	}
}
?>