<?php

namespace Modules\KamenTheme\Entities\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VissionMission extends Model
{
    protected $guarded = [];

    protected $table = 'setting_vission_mission';

    public function details(): HasMany
    {
        return $this->hasMany(VissionMissionDetail::class, 'vission_mission_id');
    }
}
