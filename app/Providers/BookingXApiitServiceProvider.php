<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\BookingXApiit;

class BookingXApiitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('BookingXApiit', function () {
            return new BookingXApiit();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
