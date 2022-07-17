<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class Satisfaction extends Model
{
    use HasAuthor;

    protected $table = 'satisfactions';

    protected $guarded = [];
}
