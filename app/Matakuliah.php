<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{

	protected $table = 'matakuliah';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

    protected $fillable = array( 
    	'name', 
	);

	public function reservation()
	{
		return $this->hasMany('App\Reservation');
	}
}
