<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpiredDomain;
use App\Jobs\ExpiredDomainProcess;
use App\Imports\FileImport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
class ExpiredDomainController extends Controller
{
   
    public function index(Request $request){
    
        if ($request->ajax()) {

            $data = ExpiredDomain::all();
                    
            return DataTables::of($data) 
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;

                    })->rawColumns(['action'])
                    ->make(true);
                   
        }

        return view('expiredDomain/index');
       
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {

        $file=$request->file('file');
        $extension=$file->extension();
       
        if($extension =="txt"){

        $doc=file_get_contents($file);

        $domains=explode("\n",$doc);
        $chunks = array_chunk($domains,1000);

      
            $header = [];

            foreach ($chunks as $key => $domain) {

            $data = array_map('str_getcsv', $domain);

                if($key == 0){

                    $header = $data[0];

                    unset($data[0]);
                }
          

      ExpiredDomainProcess::dispatch($data,$header); 


            
            }
             echo "stored"; 

         }

         else{

       $file=$request->file('file');
        Excel::import(new FileImport,$file);


        $cart=Jobs::count();

        dd($cart);


         }
   
}

       
    

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
