<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'brand'    => 'required',
            'category' => 'required',
            'img'      => 'mimes:jpg,jpeg,png,gif'
        ];
    }

    public function messages(): array
    {
        return [
            'brand.required'    => 'Thương hiệu không được để trống',
            'category.required' => 'Loại sản phẩm không được để trống',
            'img.mimes'         => 'Hình ảnh phải có đuôi .jpg .jpeg .png .gif'
        ];
    }
}
