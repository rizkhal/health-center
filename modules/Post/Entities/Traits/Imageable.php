<?php

namespace Modules\Post\Entities\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Post\Entities\Image;

trait Imageable
{
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
