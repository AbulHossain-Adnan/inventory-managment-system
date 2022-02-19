<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Queue;
use App\Notifications\queueJobFailedAlert;
use Illuminate\Queue\Events\JobFailed;


class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        //
    }

   
    public function boot(){
   
      Queue::failing(function (JobFailed $event) {
            $event->connectionName;
           $user = User::first();
            $user->notify(new queueJobFailedAlert());
        });
    }
}
