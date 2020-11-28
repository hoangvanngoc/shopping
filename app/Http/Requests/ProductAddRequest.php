<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products1s|max:255|min:10',
            'price'=> 'required',
            'category_id'=> 'required',
            'contents'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'tên không được phép để trống',
            'name.unique' => 'tên sản phẩm đã tồn tại',
            'name.max' => 'tên không được quá 255 ký tự',
            'name.min' => 'tên không được dưới 10 ký tự',
            'price.required' => 'yêu cầu nhập giá của sản phẩm',
            'category_id.required' => 'yêu cầu nhập danh mục',
            'contents.required' => 'yêu cầu nhập nội dung',
        ];
    }
}
