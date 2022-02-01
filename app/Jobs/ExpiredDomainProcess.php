<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ExpiredDomain;

class ExpiredDomainProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $header;
    public $domain;

    public function __construct($domain, $header)
    {
        $this->domain = $domain;
        $this->header = $header;
    }

   

 
    public function handle()
    {
          foreach ($this->domain as $item) {


                // $domain_name=explode(".",$item);
                // $extension=end($domain_name);
                // $ExpiredDomain= new ExpiredDomain;
                // $ExpiredDomain->domain=$extension;
                // $ExpiredDomain->save();
           
            ExpiredDomain::create(['domain'=>"test"]);
            
        }
    }
}
