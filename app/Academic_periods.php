<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic_periods extends Model
{
    protected $table = 'academic_periods';

    public function sections(){
    	return $this->belongsTo('App\Sections');
    }
}
