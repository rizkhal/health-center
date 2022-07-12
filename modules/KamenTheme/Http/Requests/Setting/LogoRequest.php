<?php

namespace Modules\KamenTheme\Http\Requests\Setting;

use App\Abstracts\FormRequest;
use Illuminate\Http\UploadedFile;

class LogoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'logo' => ['required'],
            'logo_alt' => ['nullable'],
        ];
    }

    public function getData(): array
    {
        $path = $this->logo instanceof UploadedFile ? $this->file('logo')->store('photos/shares') : $this->logo;

        return [
            'logo' => $path,
            'logo_alternative' => $this->logo_alt,
        ];
    }
}
