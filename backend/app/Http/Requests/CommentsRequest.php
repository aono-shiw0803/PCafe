<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
            'title' => 'required|max:30',
            'content' => 'required|max:200',
        ];
    }

    public function messages(){
      return [
        'title.required' => '必須項目です。',
        'content.required' => '必須項目です。',
        'title.max:30' => '30文字以内で記入してください。',
        'content.max:200' => '200文字以内で記入してください。',
      ];
    }
}
