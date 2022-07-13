<?php

namespace App\Abstracts;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function isUpdate(): bool
    {
        return $this->method() === 'PUT' || $this->method() === 'PATCH';
    }
}
