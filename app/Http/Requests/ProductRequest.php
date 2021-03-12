<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'status' => 'required|string',
            'inventory' => 'required|integer',
            'price' => 'required|numeric',
            'id_category' => 'required'
        ];
    }
}
