<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';

    public function sections(){
    	return $this->belongsTo('App\Sections');
    }

    public function teachers(){
    	return $this->belongsToMany('App\Teachers', 'Subjects_Teachers', 'subjects_id', 'teachers_id');
    }
}
