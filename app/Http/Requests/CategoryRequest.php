<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|max:20',
            'description'=>'required|max:190'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Category name is not null',
            'name.max'=>'Max is 20',
            'description.max'=>'Max is 190',
            'description.required'=>'Category description is not null'
        ];
    }
}
