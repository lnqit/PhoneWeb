<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|max:20',
            'color'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Color name is not NULL',
            'name.max'=>'Max is 20',
            'color.required'=>'Color is not NULL',

            
        ];
    }
}
