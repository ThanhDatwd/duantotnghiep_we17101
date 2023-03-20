<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content'=>'required',
            
        ];
        
    }
    public function messages()
    {
        return [
            'content.required' => 'Nội dung không được để trống',
            // 'content.min' => 'Nội dung phải ít nhất 50 kí tự',
          
        ];
    }
}
