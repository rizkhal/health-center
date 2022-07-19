<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class Covid extends Model
{
    use HasAuthor;

    protected $table = 'covid';

    protected $fillable = [
        'content',
    ];
}
