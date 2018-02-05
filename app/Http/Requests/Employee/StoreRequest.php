<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        // dd($this->all());
        return [
           'name' => 'required|unique:employees,name|max:255',
           'phonenumber' =>   'required|unique:employees,phonenumber|max:255',
           'email' =>   'required|email',
           'amount'  => 'required',
           'address' =>'required',      
        ];
    }
}
