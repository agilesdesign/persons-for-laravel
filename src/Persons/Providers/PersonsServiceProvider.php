<?php

namespace Persons\Providers;

use Illuminate\Support\ServiceProvider;

class PersonsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}
