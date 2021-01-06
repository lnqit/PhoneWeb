<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_code'=>'required|max:120',
            'product_name'=>'required|max:120',
            'description'=>'required|max:180',
            'price'=>'required|numeric',
            'city_id'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'color_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'product_code.required'=>'Product Code is not NULL',
            'product_name.required'=>'Product name is not NULL',
            'description.max'=>'Max is 180',
            'product_name.max'=>'Max is 120',
            'product_code.max'=>'Max is 120',
            'description.required'=>'Description is not NULL',
            'price.required'=>'Price is not NULL',
            'price.numeric'=>'Price is not valid',
            'city_id.required'=>'City name is not NULL',
            'brand_id.required'=>'Brand name is not NULL',
            'category_id.required'=>'Category is not NULL',
            'color_id.required'=>'Color is not NULL'
            
        ];
    }
}
