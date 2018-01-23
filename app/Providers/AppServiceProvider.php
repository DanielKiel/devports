<?php

namespace App\Providers;

use App\Core\LaravelExtends\UrlGenerator;
use App\Observer\UserObserver;
use App\User;
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

        User::observe(UserObserver::class);
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
