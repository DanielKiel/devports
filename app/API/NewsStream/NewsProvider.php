<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 13.01.18
 * Time: 21:11
 */

namespace App\API\NewsStream;


use App\API\NewsStream\Models\News;
use App\API\NewsStream\Observer\NewsObserver;

class NewsProvider
{
    public static function boot()
    {
        News::observe(new NewsObserver());
    }
}