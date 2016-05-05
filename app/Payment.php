<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
	use SoftDeletes;

	protected $table = 'payment';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'users_id',
		'paket_id',
		'bulan',
		'tahun'
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function users()
	{
		return $this->belongsTo('App\User');
	}

	public function paket()
	{
		return $this->belongsTo('App\Paket');
	}
	
}
