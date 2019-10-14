<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->user()->hasRole('admin');
        });
        Blade::if('student', function () {
            return auth()->user()->hasRole('student');
        });
        Blade::if('contractFinance', function() {
            return auth()->user()->hasRole('contractor') || auth()->user()->hasRole('finance');
        });
        Blade::if('general', function() {
            return auth()->user()->hasRole('general');
        });
    }

}
