<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */public function authorize()
  {
    return true;
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */public function rules()
  {
    return [
      'firstName' => 'required',
      'lastName' => 'required',
      'email' => 'required|email',
      'postcode' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
      'address' => 'required',
      'opinion' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'firstName.required' => 'お名前（姓）を入力してください',
      'lastName.required' => 'お名前（名）を入力してください',
      'email.required' => 'メールアドレスを入力してください',
      'email.email' => 'メールアドレスの形式で入力してください',
      'postcode.required' => '郵便番号を入力してください',
      'postcode.regex' => '郵便番号はハイフン付きの8桁で入力してください',
      'address.required' => '住所を入力してください',
      'opinion.required' => 'ご意見を入力してください'      
   ];
  }
}