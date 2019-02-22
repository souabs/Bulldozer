<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    
    /*
         4- Les liens datant de plus que 24 heures doivent être supprimés
         Configure server to add crond job : 

    * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
    
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            DB::delete('delete from link where TIMESTAMPDIFF(hour,Now(),created_at)>=24');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
