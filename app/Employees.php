<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model {

	protected $table = 'employees';

	protected $fillable = ['names', 'last_name', 'email', 'job', 'office_phone', 'personal_phone', 'cellphone', 'address', 'identity_card', 'civil_status', 'users_id'];

	public function user() {

		return $this->hasOne('App\User');

	}
}
