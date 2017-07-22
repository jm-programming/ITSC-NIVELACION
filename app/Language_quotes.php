<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language_quotes extends Model
{
    protected $table = 'language_quotes';
    protected $fillable = ['names', 'last_name','matricula','career','birthday','identity_card','email','date','time','location'];
}
