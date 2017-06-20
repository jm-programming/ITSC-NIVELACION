<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $table = 'sections';

    public function subjects(){
    	return $this->hasOne('App\Subjects');
    }

    public function classrooms(){
    	return $this->hasOne('App\Classrooms');
    }

    public function teachers(){
    	return $this->hasOne('App\Teachers');
    }

    public function academic_periods(){
    	return $this->hasOne('App\Academic_periods');
    }

    public function inscribed(){
    	return $this->belongsTo('App\Inscribed');
    }
}
