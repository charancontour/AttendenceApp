<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
           'name' => 'required|max:255|unique:employees,name,'.$this->segment(3),
           'phonenumber' =>   'required|max:255|unique:employees,phonenumber,'.$this->segment(3),
           'amount' => 'required',
           'email' =>   'required|email',
           'address' =>'required',
        ];
    }
}
