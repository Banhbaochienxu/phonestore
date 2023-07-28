<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $unique = 'unique:brand,brand_name';
        
        if(session('id')){
            $id = session('id');
            $unique = 'unique:brand,brand_name,'.$id;
        };
        return [
            'brand_name'         => 'required|'.$unique
        ];
    }

    public function messages(): array
    {
        return [
            'brand_name.required'    => 'Thương hiệu không được để trống', 
            'brand_name.unique'      => 'Thương hiệu đã tồn tại'
        ];
    }
}
