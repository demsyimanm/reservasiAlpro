<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   
    protected $table = 'users';
    protected $fillable = ['name', 'no_hp', 'alamat', 'email', 'facebook', 'line',];
}
