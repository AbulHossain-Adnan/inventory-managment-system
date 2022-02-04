<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ExpiredDomain;
use Illuminate\Bus\Batchable;

use DB;

class ExpiredDomainStore implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
      
    }

   

    public function handle()
    {
            foreach ($this->data as $domains) {

                foreach($domains as $domain){
                    $domain_name=DB::table('expired_domains')->where('domain',$domain)->exists();
                    if(!$domain_name){
                        ExpiredDomain::create(['domain'=>$domain]);


                    }

            }
        }
         return "stored";
    }

   
}
