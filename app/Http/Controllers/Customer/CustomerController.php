<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    
    public function index()
    {
        return view('customer/index',[
            'customers'=>Customer::orderBy('id','desc')->paginate(4)
        ]);
    }

   
    public function create()
    {
        return view('customer/create');
    }


    public function store(CustomerRequest $request)
    {
       
        Customer::create($request->all());
         toastr()->success('Customer Created succesfully');
        return redirect()->route('customer.index');
    }

  
    public function edit($id)
    {
        return view('customer/edit',['customer'=>Customer::findOrFail($id)]);
    }

   
    public function update(CustomerRequest $request, $id)
    {

        Customer::findOrFail($id)->update($request->all());
         toastr()->success('Customer updated succesfully');
       return redirect()->route('customer.index');
    }

   
    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
         toastr()->success('Customer deleted succesfully');
        return back();
    }
}
