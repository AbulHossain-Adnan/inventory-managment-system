<?php

namespace App\Services;
use App\Imports\FileImport;
use App\Jobs\ExpiredDomainStore;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

class FileService{

	public function fileHandle($request){

      $chunk_size=$request['chunk'];
      $file=$request['file'];
      $extension=$file->extension();
        $batch  = Bus::batch([])->dispatch();
       
      if($extension =="txt"){

         $doc = file_get_contents($file);
         $domains = explode("\n",$doc);
         $chunks = array_chunk($domains,$chunk_size);
          
        

         foreach ($chunks as $key => $domain) {
            $data = array_map('str_getcsv', $domain);
                
            // ExpiredDomainStore::dispatch($data);

             $batch->add(new ExpiredDomainStore($data));

         }
           return $batch;
      }

      else{

         Excel::import(new FileImport,$file);
        
      }
	}
}

 ?>