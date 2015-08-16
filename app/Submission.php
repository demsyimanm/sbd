<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmissionModel extends Model
{
	use SoftDeletes;

	protected $table = 'submissions';
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
		return $this->belongsTo('App\Models\QuestionModel');
	}

	public function user()
	{
		return $this->hasMany('App\Models\UserModel');
	}	
}
