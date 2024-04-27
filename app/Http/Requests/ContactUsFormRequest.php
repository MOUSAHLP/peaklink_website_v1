<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsFormRequest extends FormRequest
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

    return match ($this->route()->getActionMethod()) {
      'save_contact_us_form'   =>  $this->getSaveContactUsFormRules(),
      'save_product_form'   =>  $this->getSaveProductFormRules(),
    };
  }

  public function getSaveContactUsFormRules()
  {
    return [
      'name'   => 'required|min:3|max:30',
      'email' => 'required|email|max:40',
      'phone'  => 'required|digits_between:9,13',
      'message'  => 'required|min:3',
      'file'  => '',
      // 'g-recaptcha-response' => 'required|captcha'
    ];
  }
  
  public function getSaveProductFormRules()
  {
    return [
      'product_id'   => 'required|exists:products,id',
      'name'   => 'required|min:3|max:30',
      'email' => 'required|email|max:40',
      'phone'  => 'required|digits_between:9,13',
      'message'  => 'required|min:3',
      'file'  => '',
      // 'g-recaptcha-response' => 'required|captcha'
    ];
  }
}
