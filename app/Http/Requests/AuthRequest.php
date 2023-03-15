<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'address' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|integer|max:11',
            'email'=>'required|email',
            'username' => 'required|min:10',
            'password'=>['required'],
            'first_name'=>'required',
            'last_name'=>'required',
            'full_name'=>'required',
            'birthday'=>'required',
            'address'=>'required',
            'province'=>'required',
            'district'=>'required',
            'ward'=>'required',
        ];
        
    }
    public function messages()
    {
        return [
            'user.required' => 'Họ tên không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            // 'password.min' => 'Mật khẩu phải có ít nhất 8 kí tự',
            'address.required' => 'Địa chỉ không được để trống',
            'avatar.required' => 'Ảnh đại diện không được để trống',
            'avatar.image' => 'Ảnh phải là định dạng: jpeg, png, jpg, gif, svg',
            'avatar.mimes' => 'Ảnh phải là định dạng: jpeg, png, jpg, gif, svg',
            'avatar.max' => 'Dung lượng ảnh đại diện không được vượt quá 2048 KB',
            'email.required'=>'Email không được để trống',       
            'email.email'=>'Email không đúng định dạng',       
            'phone.required'=>'Số điện thoại không được để trống',
            'phone.integer'=>'Số điện thoại phải là số',
            'phone.max'=>'Số điện thoại không đúng định dạng',
            'phone.required'=>'Số điện thoại không được để trống',
            'first_name.required'=>'Trường này không được để trống',
            'last_name.required'=>'Trường này không được để trống',
            'full_name.required'=>'Trường này không được để trống',
            'birthday.required'=>'Trường này không được để trống',
            'address.required'=>'Trường này không được để trống',
            'province.required'=>'Trường này không được để trống',
            'district.required'=>'Trường này không được để trống',
            'ward.required'=>'Trường này không được để trống',
        ];
    }
}
