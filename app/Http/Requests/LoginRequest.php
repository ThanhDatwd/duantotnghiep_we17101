<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            // 'username' => 'required|min:10',
            // 'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'phone' => 'required|max:11',
            'email'=>'required|email',
            'password'=>'required',
            // 'address' => 'required|string|max:255',
            // 'first_name'=>'required',
            // 'last_name'=>'required',
            // 'full_name'=>'required',
            // 'birthday'=>'required',
            // 'address'=>'required',
            // 'province'=>'required',
            // 'district'=>'required',
            // 'ward'=>'required',
        ];
        
    }
    public function messages()
    {
        return [
            'email.required' => 'Họ tên không được để trống',
            'password.required' => 'Mật khẩu không được để trống',    
        ];
    }
}
