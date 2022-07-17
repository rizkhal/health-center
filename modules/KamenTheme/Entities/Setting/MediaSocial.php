<?php

namespace Modules\KamenTheme\Entities\Setting;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Relations\HasAuthor;

class MediaSocial extends Model
{
    use HasAuthor;

    protected $table = 'setting_media_socials';

    protected $fillable = [
        'url',
        'name',
        'type',
        'target',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'url' => 'string',
        'target' => 'boolean',
    ];
}
