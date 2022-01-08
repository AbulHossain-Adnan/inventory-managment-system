<?php
namespace App\Http\Controllers\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order_detail;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;

use DB;
class ReportController extends Controller
{

// last 30 days sold product list
public function sold_products(){
$date=Carbon::today()->subDays(30);
return view('report/sold_products',[
'sold_products'=> DB::table('Order_details')->where('created_at','>=',$date)->paginate(4)
]);
}

// low quantity product list
public function low_quantity(){

return view('report/low_quantity',[
'low_quantity_products'=>DB::table('products')->where('quantity','<',5)->paginate(4)
]);

}

// topcustomer list
public function topcustomer(){
return view('customer/top_customer',['top_customers'=>Customer::withCount('orders')
->orderBy('orders_count','desc')->take(5)->get()]);
}

// each product sold report
public function eachproductsold(){
	
$collection = DB::table('Order_details')->groupBy('product_id')
->selectRaw('count(*) as total, product_id')
->paginate(4);
	return view('report/eachproductsold',compact('collection'));

}


// sold product details
public function eachproductshow($id){
	$product=Product::findOrFail($id);

	return view('report/each_product_view',compact('product'));
}
}