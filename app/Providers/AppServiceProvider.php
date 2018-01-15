<?php

namespace App\Providers;

use App\API\NewsStream\NewsProvider;
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

            return new UrlGenerator($this->app->get('routes'), $this->app->get('request'));
        });

        NewsProvider::boot();
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
