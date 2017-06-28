<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'section','status','time_first','time_last', 'quota','day_one','day_two','shift','sections_classrooms_id_foreign','subjects_id','sections_academic_periods_id_foreign','users_id',
    ];

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
