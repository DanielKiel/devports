<?php

namespace App\API\NewsStream\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    const STATUS_OPEN = 10;
    const STATUS_DRAFT = 20;
    const STATUS_PUBLISHED = 30;

    protected $table = 'news';

    protected $fillable = [
        'status', 'user_id', 'title', 'subtitle', 'teaser', 'content'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOpen(Builder $query)
    {
        return $query->where('status', self::STATUS_OPEN);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeDraft(Builder $query)
    {
        return $query->where('status', self::STATUS_DRAFT);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }
}
