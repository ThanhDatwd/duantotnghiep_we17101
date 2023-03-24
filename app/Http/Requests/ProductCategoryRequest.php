<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
            'category_name' => 'required',
            'stt' => 'required|integer',
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
    }
    public function messages()
    {
        return [
            'category_name.required' => 'Tên sản phẩm không được để trống',
            'stt.required' => 'Vui lòng chọn thể loại',
            'thumb.required' => 'Ảnh không được để trống',
            'thumb.image' => 'Ảnh phải là hình ảnh',
            'thumb.mimes' => 'Ảnh phải là định dạng: jpeg, png, jpg, gif, svg',
            'thumb.max' => 'Dung lượng ảnh không được vượt quá 2048 KB',
        ];
    }
}
