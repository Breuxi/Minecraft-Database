<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
//         Commands\Inspire::class,
        Commands\Ping::class,
        Commands\Query::class,
        Commands\NameResolve::class,
        Commands\NameHistory::class,
        Commands\SkinDownload::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('app:ping')->everyThirtyMinutes()->sendOutputTo(storage_path() . '/logs/ping.log', true);
        $schedule->command('app:query')->weekly()->sendOutputTo(storage_path() . '/logs/query.log', true);
//        $schedule->command('queue:work --daemon')->everyMinute()->withoutOverlapping();
    }
}
