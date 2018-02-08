<?php

namespace App\Http\Requests\Attendence;

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
        // dd($this->request);
        return [
        
            'date'              =>      'required|unique:attendences,id,'.$this->segment(3),
            'workingday'        =>      'required',
        ];
    }
}
