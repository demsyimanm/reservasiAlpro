<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use SoftDeletes;

	protected $table = 'matakuliah';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

    protected $fillable = array( 
    	'name', 
	);
    protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function reservation()
	{
		return $this->hasMany('App\Reservation');
	}
}
