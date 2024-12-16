<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
        // ФИЛЬТР не работает с required  или  required|string и т.д.
        return [
            'title' => 'string',
            'countent' => 'string',
            'image' => 'string',
            'author' => 'string',
            'hit' => '',
            'category' => '',
        ];
    }
}
