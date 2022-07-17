<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class Information extends Model
{
    use HasAuthor;

    protected $table = 'informations';

    protected $fillable = ['content'];
}
