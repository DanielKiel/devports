<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 13.01.18
 * Time: 21:10
 */

namespace App\API\NewsStream\Observer;


use App\API\NewsStream\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsObserver
{
    /**
     * @param News $news
     */
    public function creating(News $news)
    {
        if (empty($news->user_id)) {
            $news->user_id = Auth::id();
        }
    }
}