<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpiredDomain;
use App\Jobs\ExpiredDomainProcess;
use Illuminate\Support\Facades\Bus;
class ExpiredDomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request->file('file');
        $doc=file_get_contents($file);

        $domains=explode("\n",$doc);
        $chunks = array_chunk($domains,1000);

        $header = [];
            $batch  = Bus::batch([])->dispatch();

            foreach ($chunks as $key => $domain) {

            $data = array_map('str_getcsv', $domain);

            // $data=$domain;

                if($key == 0){

                    $header = $data[0];

                    unset($data[0]);
                }



            ExpiredDomainProcess::dispatch($data,$header);

                
                
            }
           

                // $data=new ExpiredDomain();
                // $data->domain=$item;
                // $data->save(); 

    

            
    
      
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
