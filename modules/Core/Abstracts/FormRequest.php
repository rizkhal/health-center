<?php

namespace Modules\Core\Abstracts;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

abstract class FormRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
