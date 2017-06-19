<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'names','last_name','career','birthday', 'identity_card','civil_status','email','shift','inscribed_opportunity','opportunity_comment','debt','condition','created_at', 'updated_at'
    ];

    public function user(){
    	return $this->hasOne('App\User');
    }

    public function subjects(){
    	return $this->belongsToMany('App\Subjects');
    }
}
