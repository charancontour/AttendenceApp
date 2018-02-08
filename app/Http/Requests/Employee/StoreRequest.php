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
           'name'               =>        'required|unique:employees,name|max:255',
           'phone_number'       =>        'required|unique:employees,phone_number|max:255',
           'email'              =>        'required|email',
           'monthly_salary'     =>        'required',
           'monthly_reductions' =>        'required',
           'address'            =>        'required',      
        ];
    }
}
