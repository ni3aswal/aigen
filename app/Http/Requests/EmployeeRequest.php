<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

//validation
    public function rules()
    {
        return [
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'company_id'        => 'required|integer',
            'email'             => 'nullable|email',
            'phone_number'      => 'nullable|numeric'
        ];
    }
}
