<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'username' => 'required|min:10',
            'phone' => 'required',
            'email'=>'required|email',
            'address' => 'required|string|max:255',
            'province'=>'required',
            'district'=>'required',
            'ward'=>'required',
            
        ];
        
    }
    public function messages()
    {
        return [
            'username.required' => 'Họ tên không được để trống',
            'email.required'=>'Email không được để trống',       
            'email.email'=>'Email không đúng định dạng',       
            'phone.required'=>'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'phone.required'=>'Số điện thoại không được để trống',
            'address.required'=>'Trường này không được để trống',
            'province.required'=>'Trường này không được để trống',
            'district.required'=>'Trường này không được để trống',
            'ward.required'=>'Trường này không được để trống',
          
        ];
    }
}
