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
        Commands\WeeklyTagUpdate::class,
        Commands\MonthlyTagUpdate::class,
        Commands\DaylyTagUpdate::class      
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        $schedule->command('weekly:update')
                 ->weeklyOn(1, '8:00'); //毎週月曜日の8時に行う

        $schedule->command('monthly:update')
                 ->monthlyOn(1, '8:00'); //毎月1日の10時に行う

        $schedule->command('daily:update')
                 ->dailyAt('8:00');
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
