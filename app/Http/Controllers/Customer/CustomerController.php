<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index()
    {
        return view('customer/index',[
            'customers'=>Customer::orderBy('id','desc')->get()
        ]);
    }

    public function alldata(Request $request){

         $columns = array( 
                            0 =>'id', 
                            1 =>'name',
                            2=> 'email',
                            3=> 'phone',
                            4=> 'address',
                           

                            
                        );
  
        $totalData = Customer::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $posts = Customer::offset($start)
                         ->limit($limit)
                        
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $posts =  Customer::where('id','LIKE',"{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->orWhere("phone", "LIKE","%{$search}%")
                            ->orWhere("email", "LIKE","%$search%")
                            ->orWhere("address", "LIKE","%".$search."%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Customer::where('id','LIKE',"%{$search}%")
                             ->orWhere('name', 'LIKE',"%{$search}%")
                              ->orWhere("phone", "LIKE","%{$search}%")
                            ->orWhere("email", "LIKE","%{$search}%")
                            ->orWhere("address", "LIKE","%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
               $edit=route('customer.edit',$post->id);
               $delete=route('customer.delete',$post->id);


                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['email'] = $post->email;
                $nestedData['phone'] = $post->phone;
                $nestedData['address'] = $post->address;
                $nestedData['options'] = "&emsp;<a class='btn btn-primary btn-sm' href='".$edit."' title='SHOW' ><span class='glyphicon glyphicon-list'>Edit</span></a>
                                          &emsp;<a type='button' class='btn btn-danger btn-sm'  title='EDIT' onclick='deletbtn({$post->id})' ><span class='glyphicon glyphicon-edit'>Delete</span></a>";
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
        
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
         return response()->json(['success'=>'succesfully']);
        
    }
}
