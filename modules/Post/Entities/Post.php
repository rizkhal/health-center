<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Entities\Relations\HasAuthor;
use Modules\Core\Entities\Traits\HasUuid;
use Modules\Post\Entities\Traits\Imageable;

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
                'slug' => "{$model->slug}-".time(),
            ]);
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
