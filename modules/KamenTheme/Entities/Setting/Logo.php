<?php

namespace Modules\KamenTheme\Entities\Setting;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Logo extends Model
{
    protected $table = 'setting_logo';

    protected $guarded = [];

    public function logo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::of($value)->whenStartsWith(
                ['http://', 'https://'],
                fn ($str) => $str,
                fn () => env('APP_URL', 'http://health-center.test') . "/{$value}"
            ),
        );
    }
}
