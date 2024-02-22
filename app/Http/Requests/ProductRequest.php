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
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'image',
            'quantity' => 'required',
            'description' => 'required',
            // Add any other rules you have
        ];
    }
    public function messages()
    {
        return [
            'image.image' => 'Valid image is required',
            'name.required' => 'Product Name is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be numeric',
            'quantity.required' => 'Product quantity is required',
            'description.required' => 'Product description is required',
            // Add any other custom messages you have
        ];
    }
}
