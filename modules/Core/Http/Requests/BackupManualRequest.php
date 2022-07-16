<?php

namespace Modules\Core\Http\Requests;

use App\Abstracts\FormRequest;
use Modules\Core\Enums\Backup\Option;
use Illuminate\Validation\Rules\Enum;

class BackupManualRequest extends FormRequest
{
    public function attributes(): array
    {
        return [
            'option' => __('Opsi'),
        ];
    }

    public function rules(): array
    {
        return [
            'option' => ['required', new Enum(Option::class)],
        ];
    }
}
