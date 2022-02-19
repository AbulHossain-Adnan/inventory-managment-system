<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class queueJobFailedAlert extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

   
    public function via($notifiable)
    {
        return ['mail'];
    }

  
    public function toMail($notifiable)
    {
         return (new MailMessage)
                    ->line('You Have Failed job please Retry again for resoleve failed job.')
                    ->action('Click here', url('http://127.0.0.1:8000/failed_job'))
                    ->line('Thank you for using our application!');
    }

   
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
