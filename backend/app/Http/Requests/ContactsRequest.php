<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            'content' => 'required',
        ];
    }

    public function messages(){
      return [
        'name.required' => '必須項目です。',
        'email.required' => '必須項目です。',
        'type.required' => '必須項目です。',
        'content.required' => '必須項目です。',
      ];
    }
}
