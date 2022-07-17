<?php

namespace Modules\KamenTheme\Http\Requests;

use App\Abstracts\FormRequest;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\Enum;
use Modules\KamenTheme\Entities\Setting\MediaSocial;

class MediaSocialRequest extends FormRequest
{
    public function attributes(): array
    {
        return [
            'fields.*.url' => 'Url',
            'fields.*.type' => 'Sosial media',
        ];
    }

    public function rules(): array
    {
        return [
            'fields.*.url' => ['required', 'starts_with:http://,https://'],
            'fields.*.type' => ['required'],
        ];
    }

    public function getFields(): Collection
    {
        return collect($this->fields);
    }
}
