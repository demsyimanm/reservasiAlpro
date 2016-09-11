<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

	protected $table = 'reservation';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

    protected $fillable = array( 
        'tanggal',
        'jam_mulai',
		'jam_akhir',
        'nama_pemesan',
		'NRP_pemesan',
        'no_hp_pemesan',
        'matkul_id',
        'materi',
        'jumlah',
        'admin_id',
        'penutor',
        'status',
        'keterangan'
	);
    protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function admin()
	{
		return $this->belongsTo('App\Admin');
	}

	public function matkul()
	{
		return $this->belongsTo('App\Matakuliah');
	}
}
