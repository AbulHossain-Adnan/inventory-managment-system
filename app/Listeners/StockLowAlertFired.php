<?php

namespace App\Listeners;

use App\Events\StockLowAlertEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Models\Product;
use App\Mail\StockLowAlertMail;
use Illuminate\Support\Facades\Mail;


class StockLowAlertFired 
{
    
    public function handle(StockLowAlertEvent $event)
    {
        $user=User::first();
         mail::to($user->email)->send(new StockLowAlertMail($event->product));
    }
}
