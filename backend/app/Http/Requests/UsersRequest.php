<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
    public function rules(){
      return [
          'name' => 'required',
          'age' => 'required',
          'gender' => 'required',
          'email' => 'required',
          'from' => 'required',
      ];
    }
    
    public function messages(){
      return [
        'name.required' => '必須項目です。',
        'age.required' => '必須項目です。',
        'gender.required' => '必須項目です。',
        'email.required' => '必須項目です。',
        'from.required' => '必須項目です。',
      ];
    }
}
