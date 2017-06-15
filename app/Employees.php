<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    
    public function user(){
    	return $this->hasOne('App\User');
    }
}
