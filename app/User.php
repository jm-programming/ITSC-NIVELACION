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
        'email', 'password','status',
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

    public function teachers(){
        return $this->belongsTo('App\Teachers');
    }

    public function employees(){
        return $this->belongsTo('App\Employees');
    }
}
