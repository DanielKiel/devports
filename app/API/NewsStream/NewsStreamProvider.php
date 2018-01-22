<?php

namespace App\API\NewsStream;

use App\API\NewsStream\Observer\NewsObserver;
use Illuminate\Support\ServiceProvider;
use App\API\NewsStream\Models\News;
use Illuminate\Database\Eloquent\Relations\Relation;

class NewsStreamProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        News::observe(new NewsObserver());

        Relation::morphMap([
            'news' => News::class
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
