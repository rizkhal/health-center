<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class Service extends Model
{
    use HasAuthor;

    protected $table = 'services';

    protected $fillable = ['content'];
}
