<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SheetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind(\App\Service\TaskService::class,function($app){
            return new \App\Service\SheetService();
        });
    }
}
