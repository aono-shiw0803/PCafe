<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopsRequest extends FormRequest
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
          'area' => 'required',
          'address' => 'required',
          'wifi' => 'required',
          'outlet' => 'required',
          'credit' => 'required',
          'smoke' => 'required',
          'pet' => 'required',
          'liquor' => 'required',
          'voice' => 'required',
          'capacity' => 'required',
          'cuisine' => 'required',
          'user_id' => 'required',
          'start_time' => 'required',
          'end_time' => 'required',
      ];
    }

    public function messages(){
      return [
        'name.required' => '必須項目です。',
        'area.required' => '必須項目です。',
        'address.required' => '必須項目です。',
        'wifi.required' => '必須項目です。',
        'outlet.required' => '必須項目です。',
        'credit.required' => '必須項目です。',
        'smoke.required' => '必須項目です。',
        'pet.required' => '必須項目です。',
        'liquor.required' => '必須項目です。',
        'voice.required' => '必須項目です。',
        'capacity.required' => '必須項目です。',
        'cuisine.required' => '必須項目です。',
        'user_id.required' => '必須項目です。',
        'start_time.required' => '必須項目です。',
        'end_time.required' => '必須項目です。',
      ];
    }
}
