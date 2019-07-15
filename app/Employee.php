<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	//model for employee table
    protected $fillable = [
    	'first_name',
    	'last_name',
		'company_id',
    	'email',
    	'phone_number'
		
    ];
    public function company()
    {
    	return $this->belongsTo(Company::class,'company_id');
    }
}
