<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'coupon_code' => 'required',
            'coupon_type' => 'required',
            'description' => 'required|string',
            'discount' => 'required|integer',
            'min_condition'=>'required|integer',
            'limit_used' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
    }
    public function messages()
    {
        return [
            'coupon_code.required' => 'Mã sản phẩm không được để trống',
            'coupon_type.required' => 'Loại sản phẩm không được để trống',
            'summary.required' => 'Tóm tắt không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'thumb.required' => 'Ảnh đại diện không được để trống',
            'thumb.image' => 'Ảnh đại diện phải là hình ảnh',
            'thumb.mimes' => 'Ảnh đại diện phải là định dạng: jpeg, png, jpg, gif, svg',
            'thumb.max' => 'Dung lượng ảnh đại diện không được vượt quá 2048 KB',
            'price.required'=>'Giá không được để trống',       
            'price_current.required'=>'Giá bán không được để trống',
        ];
    }
}
