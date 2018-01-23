<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 16.01.18
 * Time: 20:47
 */

namespace App\API\Comments\Observer;


use App\API\Comments\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentObserver
{
    public function creating(Comment $comment)
    {
        if (! Auth::guest()) {
            $comment->user_id = Auth::id();
        }

        $comment->status = 0; // a comment must be read before it will be published !
    }

    public function created(Comment $comment)
    {

    }
}