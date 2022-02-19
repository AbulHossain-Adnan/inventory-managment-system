<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\StockLowAlertEvent;
use App\Listeners\StockLowAlertFired;


class EventServiceProvider extends ServiceProvider
{
   
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
         StockLowAlertEvent::class => [
            StockLowAlertFired::class,
        ],
    ];

   
    public function boot()
    {
        //
    }
}
