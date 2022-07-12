<?php

namespace Modules\Post\Http\Requests;

use App\Abstracts\FormRequest;
use Illuminate\Support\Str;
use Modules\Post\Entities\Category;

class PostRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        $this->merge([
            'category' => isset($this->category['value']) ? $this->category['value'] : null,
        ]);
    }

    public function attributes(): array
    {
        return [
            'title' => __('Judul'),
            'category' => __('Kategori'),
            'cover' => __('Cover'),
        ];
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string'],
            'cover' => ['required', 'file'],
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
            'slug' => Str::of($this->title)->slug('-'),
        ]);
    }
}
