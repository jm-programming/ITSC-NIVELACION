<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'names','last_name','teacher_status','teacher_code', 'identity_card','personal_phone','cellphone',
    ];

    public function user(){
    	return $this->hasOne('App\User');
    }

    public function subjects(){
    	return $this->belongsToMany('App\Subjects');
    }
}
