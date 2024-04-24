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
      'save'   =>  $this->getsaveRules(),
    };
  }

  public function getsaveRules()
  {
    return [
      'name'   => 'required|min:3|max:30',
      'email' => 'required|email|max:40',
      'phone'  => 'required|digits_between:9,13',
      'message'  => 'required|min:3',
      'file'  => '',
    //   'file'  => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv,txt',
    ];
  }
}
