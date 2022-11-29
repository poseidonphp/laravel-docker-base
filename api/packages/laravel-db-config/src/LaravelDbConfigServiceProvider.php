<?php

namespace Poseidonphp\LaravelDbConfig;

use Illuminate\Support\ServiceProvider;

class LaravelDbConfigServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/dbconfig.php' => config_path('dbconfig.php'),
            ], 'config');


            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__.'/database/migrations/create_config_table.php' => $this->app->databasePath()."/migrations/{$timestamp}_create_config_table.php",
            ], 'migrations');
        }


    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dbconfig.php', 'dbconfig');

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
//    public function provides()
//    {
//        return ['msgraph'];
//    }
}
