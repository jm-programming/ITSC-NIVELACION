<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $table = 'sections';

    public function subjects(){
    	return $this->hasMany('App\Subjects');
    }

    public function classrooms(){
    	return $this->hasMany('App\Classrooms');
    }

    public function teachers(){
    	return $this->hasMany('App\Teachers');
    }

    public function academic_periods(){
    	return $this->hasMany('App\Academic_periods');
    }

    public function inscribed(){
    	return $this->belongsTo('App\Inscribed');
    }
}
