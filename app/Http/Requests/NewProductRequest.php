<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required' , 'unique:products,name'],
            'slug' => ['required' , 'unique:products,slug' , 'alpha_dash'],
            'category_id' => ['required' , 'exists:categories,id'],
            'brand_id' => ['required' , 'exists:brands,id'],
            'cost' => ['required' , 'decimal:0'],
            'description' => ['required'],
            'image' => ['required' , 'mimes:jpg,jpeg,png,mpeg,webp' , 'max:5000']
        ];
    }
}
