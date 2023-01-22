<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необходимо указать название',
            'title.string' => 'Некорректное название',
            'content.required' => 'Необходимо ввести текст',
            'content.string' => 'Некорректный текст',
            'image.file' => 'выберите файл',
            'category_id.required' => 'Необходимо указать категорию',
            'category_id.integer' => 'Неверно указана категория',
            'category_id.exists:categories,id' => 'Недопустимая категория',
            'tags.array' => 'Неверно указаны теги',
            'tags.*.exists' => 'Недопустимый тег',
        ];
    }


}
