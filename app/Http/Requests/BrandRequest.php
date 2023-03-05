<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            //'title' => 'required|string|max:255',
            'brands' => 'required|string',
            'address' => 'required|string|max:255',
            'phone' => 'required|integer',
            'email'=>'required|email',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
    }
    public function messages()
    {
        return [
            'brands.required' => 'Nguồn hàng không được để trống',
            'brands.alpha' => 'Nguồn hàng phải là chữ',
            'address.required' => 'Địa chỉ không được để trống',
            'avatar.required' => 'Ảnh đại diện không được để trống',
            'avatar.image' => 'Ảnh đại diện phải là hình ảnh',
            'avatar.mimes' => 'Ảnh đại diện phải là định dạng: jpeg, png, jpg, gif, svg',
            'avatar.max' => 'Dung lượng ảnh đại diện không được vượt quá 2048 KB',
            'email.required'=>'Email không được để trống',       
            'phone.required'=>'Số điện thoại không được để trống',
        ];
    }
}
