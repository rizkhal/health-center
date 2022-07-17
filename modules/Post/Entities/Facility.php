<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class Facility extends Model
{
    use HasAuthor;

    protected $table = 'facilities';

    protected $fillable = [
        'content',
    ];
}
