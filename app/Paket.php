<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paket extends Model
{
	use SoftDeletes;

	protected $table = 'paket';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'nama',
		'jumlah_query',
		'ukuran_db',
		'harga'
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function users()
	{
		return $this->hasMany('App\User');
	}

	public function payment()
	{
		return $this->hasMany('App\Payment');
	}
	
}
