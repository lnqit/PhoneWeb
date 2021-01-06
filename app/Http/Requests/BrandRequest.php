<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|max:20',
            'description'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Brand name is not NULL',
            'name.max'=>'Max is 20',
            'description.required'=>'Description is not NULL'
        ];
    }
}
