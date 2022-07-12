<?php

namespace Modules\KamenTheme\Http\Requests\Setting;

use App\Abstracts\FormRequest;

class HeroRequest extends FormRequest
{
    public function getId(): string|null
    {
        return $this->id;
    }

    public function attributes(): array
    {
        return [
            'title' => 'Judul',
            'summary' => 'Keterangan',
        ];
    }

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'summary' => ['required', 'max:200'],
        ];
    }
}
