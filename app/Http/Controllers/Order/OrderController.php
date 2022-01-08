<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Services\OrderService;
use Cart;
use Carbon\Carbon;


class OrderController extends Controller
{
    protected $orderservice;

    public function __construct(OrderService $orderservice){
        $this->orderservice=$orderservice;

    }
    public function index(){

        return view('order/index',['orders'=>Order::orderBY('id','desc')->paginate(4)]);

    }


    public function orderstore(Request $Request){
        if(!$Request->customer_id==NULL){
        $this->orderservice->orderstore($Request);
         return response()->json(['success'=>'Payment succesfully done']);
    }else{
         return response()->json(['error'=>'Please Select a Customer']);

    }
       

   

}

    public function paynow(){

    return response()->json(array(
        'data'=>cart::content(),
        'customers'=>Customer::all(),
        'order_total'=>cart::subtotal(),

    ));
}


// for order details
    public function show($id){

    return view('order/details',
        ['order_details'=>Order_detail::where('order_id',$id)->get()]);
    
}


    public function destroy($id){
    Order::findOrFail($id)->delete();
     toastr()->success('Order deleted succesfully');
    return back();
}
}
