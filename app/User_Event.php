<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Event extends Model
{
	use SoftDeletes;

	protected $table = 'user_event';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'users_id',
		'event_id',
		'status',
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function users()
	{
		return $this->belongsTo('App\User');
	}

	public function event()
	{
		return $this->belongsTo('App\Event');
	}
	
}
