<?php

namespace App\Providers;

use App\Core\LaravelExtends\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->extend('url', function($gen) {
           return $this->app->make(UrlGenerator::class);
        });
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
