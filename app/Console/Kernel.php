<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

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
		$schedule->command('delete:temp')
			->daily()
			->onSuccess(function () {
				Log::channel('cleanup')->info('✅ Delete Temp Files');
			})
			->onFailure(function () {
				Log::channel('cleanup')->error('❌ Delete Temp Files');
			})
			->appendOutputTo(storage_path('logs/scheduled.log'));

		$schedule->command('delete:orphaned')
			->daily()
			->onSuccess(function () {
				Log::channel('cleanup')->info('✅ Delete Orphaned Files');
			})
			->onFailure(function () {
				Log::channel('cleanup')->error('❌ Delete Orphaned Files');
			})
			->appendOutputTo(storage_path('logs/scheduled.log'));

		$schedule->command('delete:expired')
			->everyMinute()
			->onSuccess(function () {
				Log::channel('cleanup')->info('✅ Delete Expired Lists');
			})
			->onFailure(function () {
				Log::channel('cleanup')->error('❌ Delete Expired Lists');
			})
			->appendOutputTo(storage_path('logs/scheduled.log'));

		$schedule->command('backup:clean')
			->daily()->at('01:00')
			->environments(['production'])
			->onSuccess(function () {
				Log::channel('backups')->info('✅ Clean Backups');
			})
			->onFailure(function () {
				Log::channel('backups')->error('❌ Clean Backups');
			})
			->appendOutputTo(storage_path('logs/scheduled-backups.log'));

		$schedule->command('backup:run')
			->daily()->at('01:30')
			->environments(['production'])
			->onSuccess(function () {
				Log::channel('backups')->info('✅ Clean Backups');
			})
			->onFailure(function () {
				Log::channel('backups')->error('❌ Clean Backups');
			})
			->appendOutputTo(storage_path('logs/scheduled-backups.log'));
	}

	/**
	 * Register the commands for the application.
	 *
	 * @return void
	 */
	protected function commands(): void
	{
		$this->load(__DIR__ . '/Commands');

		require base_path('routes/console.php');
	}
}
