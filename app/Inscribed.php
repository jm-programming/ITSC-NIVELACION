<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscribed extends Model
{
    protected $table = 'inscribed';

    public function sections(){
    	return $this->hasMany('App\Sections');
    }

    public function students(){
    	return $this->hasMany('App\Students');
    }
}
