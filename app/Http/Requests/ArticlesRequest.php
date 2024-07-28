<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
            'photo' => 'mimes:jpg,jpeg,png',
            'content' => 'required|string',
            'title' => 'required|string',
            'categories' => 'required',
        ];
    }
    public function messages(){

        return [
            'required'  => 'هذا الحقل مطلوب ',
            'max'  => 'هذا الحقل طويل',
            'content.string'  =>'المحتوى لابد ان يكون حروف او حروف وارقام ',
            'title.string'  =>'العنوان  لابد ان يكون حروف او حروف وارقام ',
            'photo.mimes'  => 'الرجاء اضاقة صورة ',

        ];
    }
}
