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
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
	{
		$schedule->command('delete:temp')->daily();
		$schedule->command('delete:orphaned')->weekly();
		$schedule->command('delete:expired')->everyMinute();

		$schedule->command('backup:clean')->daily()->at('01:00')->environments(['production']);
		$schedule->command('backup:run')->daily()->at('01:30')->environments(['production']);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
	{
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
