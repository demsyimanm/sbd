<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History_Upload extends Model
{
	use SoftDeletes;

	protected $table = 'history_upload';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'users_id',
		'namafile',
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function users()
	{
		return $this->belongsTo('App\User');
	}
	
}
