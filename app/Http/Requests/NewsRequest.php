<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|string|max:555',
            'category_news_id' => 'required|integer',
            'summary' => 'required|string|max:255',
            'content' => 'required|string',
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
        
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'category_news_id.required' => 'Vui lòng chọn thể loại',
            'summary.required' => 'Tóm tắt không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'thumb.required' => 'Ảnh đại diện không được để trống',
            'thumb.image' => 'Ảnh đại diện phải là hình ảnh',
            'thumb.mimes' => 'Ảnh đại diện phải là định dạng: jpeg, png, jpg, gif, svg',
            'thumb.max' => 'Dung lượng ảnh đại diện không được vượt quá 2048 KB',
        ];
    }
}
