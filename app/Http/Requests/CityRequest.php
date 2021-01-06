<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|max:20',
            'postcode'=>'required|numeric|max:11'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Category name is not NULL',
            'postcode.required'=>'Postcode is not NULL',
            'postcode.numeric'=>'Postcode is Number',
            'postcode.max'=>'Max is 11',
            'name.max'=>'Max is 20',
        ];
    }
}
