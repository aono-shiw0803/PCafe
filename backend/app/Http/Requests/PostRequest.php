<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:40',
            'content' => 'max:400',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
    }

    public function messages(){
      return [
        'title.required' => '必須項目です。',
        'title.max:40' => '40文字以内で記入してください。',
        'content.max:40' => '400文字以内で記入してください。',
        'day.required' => '必須項目です。',
        'start_time.required' => '必須項目です。',
        'end_time.required' => '必須項目です。',
      ];
    }
}
