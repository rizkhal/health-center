<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Support\Str;
use App\Abstracts\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Post\Entities\Category;

class PostRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        $this->merge([
            'category' => isset($this->category['value']) ? $this->category['value'] : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string'],
            // 'slug' => ['required', 'string', Rule::unique('posts', 'slug')->whereNull('deleted_at')->ignore($this->route('post'))],
        ];
    }

    public function getData(): array
    {
        $category = Category::firstOrCreate(
            ['id' => $this->category],
            ['name' => $this->category]
        );

        return array_merge($this->validated(), [
            'category_id' => $category->id,
            'slug' => Str::of($this->title)->slug('-')
        ]);
    }
}
