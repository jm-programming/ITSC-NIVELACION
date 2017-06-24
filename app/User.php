<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'names','last_name','office_phone','cellphone', 'address','identity_card','civil_status','email', 'password','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function historical_activities(){
        return $this->belongsTo('App\Historical_activities');
    }

    public function rolls(){
        return $this->hasOne('App\Rolls');
    }
}
