<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tag_name'=>'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'tag_name.required'=>'Tag name is not NULL',
            'tag_name.max'=>'Max is 20',
        ];
    }
}
