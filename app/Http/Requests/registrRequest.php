<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registrRequest extends FormRequest
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
            'name'              => 'required|min:3',
            'email'             => 'required|email|unique:users,email',
            'number'            => 'required|regex:/(0)[0-9]{9}/',
            'address'           => 'required|min:3',
            'birthday'          => 'required',
            'password'          => 'required|min:3',
            'confirmPassword'   => 'required|same:password' 
        ];
    }
    public function messages(): array
    {
        return [
            'required'           => ':attribute không được để trống',
            'email'              => ':attribute không hợp lệ',
            'regex'              => ':attribute không phải là số điện thoại',
            'min'                => ':attribute quá ít ký tự',
            'same'               => ':attribute Không trùng khớp',
            'unique'             => ':attribute đã tồn tại'
        ];
    }
    public function attributes(): array
    {
        return [
            'name'              => 'Tên người dùng',
            'email'             => 'Email',
            'number'            => 'Số điện thoại',
            'address'           => 'Địa chỉ',
            'birthday'          => 'Ngày sinh',
            'password'          => 'Mật khẩu',
            'confirmPassword'   => 'Xác nhận mật khẩu' 
        ];
    }
}
