<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	
	//model for company table
    protected $fillable = [
		'name',
		'email',
		'logo',
		'website'
    ];
    
}
