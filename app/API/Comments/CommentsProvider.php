<?php

namespace App\API\Comments;

use App\API\Comments\Models\Comment;
use App\API\Comments\Observer\CommentObserver;
use Illuminate\Support\ServiceProvider;

class CommentsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Comment::observe(new CommentObserver());
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
