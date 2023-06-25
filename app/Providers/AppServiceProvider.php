<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// Register service providers.
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Model::preventLazyLoading(!app()->isProduction());
		Model::preventSilentlyDiscardingAttributes(!app()->isProduction());
		Paginator::useBootstrap();
	}
}
