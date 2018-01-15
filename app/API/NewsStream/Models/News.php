<?php

namespace App\API\NewsStream\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'status', 'user_id', 'title', 'subtitle', 'teaser', 'content'
    ];

    protected $statusMap = [
        10 => 'open',
        20 => 'draft',
        30 => 'published'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderedDesc', function (Builder $builder) {
            $builder->orderBy('id', 'DESC');
        });
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOpen(Builder $query)
    {
        return $query->where('status', array_search('open', $this->statusMap));
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeDraft(Builder $query)
    {
        return $query->where('status', array_search('draft', $this->statusMap));
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', array_search('published', $this->statusMap));
    }
}
