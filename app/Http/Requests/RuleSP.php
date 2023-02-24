<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleSP extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
        
        
    //     @error('masv')
    //     <span class="badge badge-danger">{{ $message }}</span>
    //    @enderror
    }
    public function messages() {
        return [
         'ht.required' => 'Phải nhập họ tên chứ',
         'ht.min' => 'Họ tên ngắn quá vậy',
         'ns.required' => 'Nhập ngày sinh nữa',
         'tuoi.required' => 'Nhập :attribute vào đi',
         'cmnd.digits_between' => 'CMND nhập 9 hoặc 10 ký tự'
       ];
     }
     
}
