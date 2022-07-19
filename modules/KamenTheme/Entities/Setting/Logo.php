<?php

namespace Modules\KamenTheme\Entities\Setting;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Logo extends Model
{
    protected $table = 'setting_logo';

    protected $guarded = [];

    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::of($value)->whenStartsWith(
                ['http://', 'https://'],
                fn ($str) => $str,
                fn () => Str::contains($value, 'storage') ? '/' . $value : config('app.url') . "/storage/{$value}"
            ),
            set: fn ($value) => Str::after("{$value}", config('app.url'))
        );
    }
}
