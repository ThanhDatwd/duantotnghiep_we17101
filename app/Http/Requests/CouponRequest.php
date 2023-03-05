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
            'end_date' => 'required|gte:start_date',
            // 'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
    }
    public function messages()
    {
        return [
            'coupon_code.required' => 'Mã sản phẩm không được để trống',
            'coupon_type.required' => 'Loại sản phẩm không được để trống',
            'summary.required' => 'Tóm tắt không được để trống',
            'description.required' => 'Nội dung không được để trống',
            'start_date' => "Ngày bắt đầu không được để trống",
            'end_date.gte' => "ds",
            'end_date' => "Ngày kết thúc không được để trống",
            'limit_used'=> "Giới hạn người dùng không được để trống",
            'discount' => "Số tiền cần giảm không được để trống",
            'min_condition' => "Số lượng mã không được để trống"
        ];
    }
}
