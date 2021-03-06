<?php

namespace App\Http\Requests\Post;

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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required|string|unique:posts,title,{$this->post->id}",
            'category_id' => 'required',
            'preview' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'is_published' => 'required',
            'tags' => 'required_without:newTags',
            'newTags' => 'required_without:tags',
        ];
    }
}
