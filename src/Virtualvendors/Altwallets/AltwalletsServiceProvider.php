<?php namespace Virtualvendors\Altwallets;

use Adamgoose\Commander\Validation\CommandValidationException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\ServiceProvider;
use Virtualvendors\Altwallets\Extensions\Validator;

class AltwalletsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 * @return void
	 */
	public function boot()
	{
		$this->package('virtualvendors/altwallets', 'altwallets');

		include __DIR__.'/../../routes.php';
		include __DIR__.'/../../macros.php';
		include __DIR__.'/../../filters.php';

		$this->bootErrorHandlers();
		$this->bootCustomValidators();
	}

	/**
	 * Register the service provider.
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

	/**
	 *
	 */
	public function bootErrorHandlers()
	{
		$this->app->error(function (CommandValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		});
	}

	/**
	 *
	 */
	public function bootCustomValidators()
	{
		$this->app['validator']->resolver(function ($translator, $data, $rules, $messages)
		{
			return new Validator($translator, $data, $rules, $messages);
		});
	}
}
