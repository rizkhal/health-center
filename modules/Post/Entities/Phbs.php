<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class Phbs extends Model
{
    use HasAuthor;

    protected $table = 'phbs';

    protected $fillable = [
        'content',
    ];
}
