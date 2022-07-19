<?php

namespace Modules\KamenTheme\Http\Requests\Setting;

use App\Abstracts\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class LogoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'logo' => ['required'],
            'logo_alt' => ['nullable'],
        ];
    }

    public function getLogoPath(): string
    {
        return $this->file('logo')->store('photos/shares/logo');
    }

    public function getData(): array
    {
        return [
            'logo' => $this->logo,
            'logo_alternative' => $this->logo_alt,
        ];
    }
}
