<?php

namespace Modules\KamenTheme\Entities\Setting;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
                fn () => config('app.url')."/{$value}"
            ),
        );
    }
}
