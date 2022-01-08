<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
   
    protected $commands = [
         Commands\DemoCron::class,
    ];

   
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
                $schedule->command('demo:cron')

                 ->everyMinute();
    }

   
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
