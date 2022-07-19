<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class Hipertency extends Model
{
    use HasAuthor;

    protected $table = 'hipertencies';
    
    protected $fillable = [
        'content',
    ];
}
