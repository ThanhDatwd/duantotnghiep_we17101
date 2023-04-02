<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'phone' => 'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
        ];
        
    }
    public function messages()
    {
        return [
            'username.required' => 'Họ tên không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 kí tự',
            'email.required'=>'Email không được để trống',       
            'email.email'=>'Email không đúng định dạng',       
            'phone.required'=>'Số điện thoại không được để trống',
        ];
    }
}
