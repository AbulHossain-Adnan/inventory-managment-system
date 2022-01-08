<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Services\CartService;
use Carbon\Carbon;
use Cart;





class CartController extends Controller
{
    protected $cartservice;

    public function __construct(CartService $cartservice){
        $this->cartservice=$cartservice;
    }


    public function index(){
        return view('sale/index',[
            'products'=>Product::all()
        ]);
    }

    public function addcart($id){
        $this->cartservice->addtocart($id);
        return response()->json(['success'=>'success']);

    }

    public function cartdata(){
      $data=$this->cartservice->cartdata();
        return Response()->json($data);
} 

    public function cartremove($rowId){
    $this->cartservice->cartremove($rowId);
    return response()->json(['success'=>'success']);
    }


    public function increment($rowId){
    $this->cartservice->increment($rowId);
    return Response()->json('succefully');
}


    public function decrement($rowId){
       $this->cartservice->decrement($rowId);
    return Response()->json('succefully');
}


    public function cartcal(){

    return Response()->json(array(
    'total'=>Cart::subtotal(),
    ));

}
    public function cartcalculation(){
        return Response()->json(array(
    'total'=>Cart::subtotal(),
    ));
   
}



}

