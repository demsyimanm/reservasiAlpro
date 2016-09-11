<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

	protected $table = 'admin';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

    protected $fillable = array( 
    	'name',
    	'nrp', 
		'no_hp', 
    	'alamat',
    	'tanggal_lahir', 
		'email', 
		'facebook', 
		'line'
	);

	public function reservation()
	{
		return $this->hasMany('App\Reservation');
	}
}
