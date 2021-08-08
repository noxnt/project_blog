<?php

namespace App\Http\Requests\Post;

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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|unique:posts',
            'category_id' => 'required',
            'preview' => 'required|string',
            'content' => 'required|string',
            'is_published' => 'required',
            'tags' => 'required_without:newTags',
            'newTags' => 'required_without:tags',
        ];
    }
}
