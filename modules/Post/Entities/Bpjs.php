<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class Bpjs extends Model
{
    use HasAuthor;

    protected $table = 'bpjs';

    protected $fillable = [
        'content',
    ];
}
