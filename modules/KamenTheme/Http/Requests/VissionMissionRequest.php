<?php

namespace Modules\KamenTheme\Http\Requests;

use App\Abstracts\FormRequest;
use Illuminate\Support\Collection;

class VissionMissionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'vission' => ['required'],
            'mission' => ['nullable'],
            'points' => ['required'],
        ];
    }

    public function getVm(): array
    {
        return [
            'vission' => $this->vission,
            'mission' => $this->mission,
        ];
    }

    public function getPointsCollection(): Collection
    {
        return collect($this->points);
    }
}
