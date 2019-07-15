<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

 //validation
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'email'     => 'nullable|string|email',
            'logo'      => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website'   => 'nullable|string|url'
          ];
    }
}
