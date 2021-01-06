<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'required|max:190',
            'status'=>'required',
            'content'=>'required|min:500',
            'keywords'=>'required',
            'desc' => 'required',
            'tag'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Title name is not NULL',
            'title.max'=>'Max is 190',
            'status.required'=>'Status must be check, It is not NULL',
            'content.required'=>'Content name is not NULL',
            'content.min'=>'Min must be 500',
            'keywords.required'=>'Keywords name is not NULL',
            'desc.required'=>'Description is not NULL',
            'tag.required'=>'Tag is not NULL'
        ];
    }
}
