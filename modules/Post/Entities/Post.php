<?php

namespace Modules\Post\Entities;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasUuid;
use Modules\Post\Entities\Traits\Imageable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Entities\Relations\HasAuthor;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasUuid,
        Imageable,
        HasAuthor,
        HasFactory,
        SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
    ];

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostFactory::new();
    }

    protected static function booted()
    {
        static::creating(function (self $model) {
            $model->fill([
                'slug' => "{$model->slug}-" . time(),
            ]);
        });
    }

    // TODO: implement cookie strategy
    public function readingCounter(string $ip): void
    {
        $this->increment('views_count');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
