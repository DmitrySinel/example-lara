<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо заполнить',
            'title.string' => 'Данные должны быть строчного типа',
            'content.required' => 'Это поле необходимо заполнить',
            'content.string' => 'Данные должны быть строчного типа',
            'preview_image.required' => 'Это поле необходимо заполнить',
            'preview_image.file' => 'Это поле должно содержать файл',
            'main_image.required' => 'Это поле необходимо заполнить',
            'main_image.file' => 'Это поле должно содержать файл',
            'category_id.required' => 'Это поле необходимо заполнить',
            'category_id.integer' => 'Данные должны быть строчного типа',
            'category_id.exists' => 'ID категории должен быть в базе данных',
            'tag_ids.array' => 'Это поле должно быть массивом'
        ];
    }
}
