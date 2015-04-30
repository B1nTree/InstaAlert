<?php 
namespace App\Providers;

/**
 * Courier Service Provider
 * 
 * @author Dylan Pierce <me@dylanjpierce.com>
 */

use App\Service\SMS\Courier;
use App\Service\SMS\TextBelt;
use Illuminate\Support\ServiceProvider;

class CourierServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @param  TextBelt
	 * @return void
	 */
	public function boot(TextBelt $textBelt)
	{
		$this->app->bind('App\Services\SMS\Courier', 'App\Services\SMS\TextBelt');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
