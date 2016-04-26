<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submission extends Model
{
	use SoftDeletes;

	protected $table = 'submission';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'questions_id',
		'users_id',
		'nilai',
		'jawaban',
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function question()
	{
		return $this->belongsTo('App\Question');
	}

	public function users()
	{
		return $this->belongsTo('App\User');
	}	
}
