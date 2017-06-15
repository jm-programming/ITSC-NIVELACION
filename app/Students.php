<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';

    public function sections(){
    	return $this->belongsTo('App\Inscribed');
    }
}
