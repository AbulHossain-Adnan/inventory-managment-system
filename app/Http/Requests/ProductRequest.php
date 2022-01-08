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
            'name'=>'required',
            'price'=>'required|numeric',
            'min_qty'=>'required|numeric',
            'quantity'=>'required|numeric',
            'image'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
          
        ];
    }
}
