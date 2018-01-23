<?php

namespace App\API\Comments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    protected $table = 'comments';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'commentable_type', 'commentable_id', 'content', 'user_id', 'status'
    ];

    protected $statusMap = [
        10 => 'open',
        20 => 'draft',
        30 => 'published'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public static function getPublishStatus()
    {
        return array_search('published', (new Comment)->statusMap);
    }
}
