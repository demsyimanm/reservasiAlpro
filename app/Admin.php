<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
   	use SoftDeletes;

	protected $table = 'users';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

    protected $fillable = array( 
    	'name', 
		'no_hp', 
    	'alamat', 
		'email', 
		'facebook', 
		'line'
	);
    protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function reservation()
	{
		return $this->hasMany('App\Reservation');
	}
}
