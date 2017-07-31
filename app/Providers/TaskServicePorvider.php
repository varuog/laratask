<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\Blade;

class TaskServicePorvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Service\TaskService::class,function($app){
            return new \App\Service\TaskService();
        });
    }
    
    
}
