<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class ServiceSchedule extends Model
{
    use HasAuthor;

    protected $table = 'service_schedules';

    protected $fillable = [
        'content',
    ];
}
