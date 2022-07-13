<?php

namespace Modules\Post\Entities;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasUuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasUuid;

    protected $table = 'imageable';

    protected $guarded = [];

    public $timestamps = false;

    public function imageable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'imageable_id', 'imageable_type');
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::of($value)->whenStartsWith(
                ['http://', 'https://'],
                fn ($str) => $str,
                fn () => config('app.url') . "/{$value}"
            ),
            set: fn ($value) => Str::after($value, config('app.url') . '/')
        );
    }
}
