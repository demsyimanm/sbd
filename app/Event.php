<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventModel extends Model
{
	use SoftDeletes;

	protected $table = 'event';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'judul',
		'konten',
		'waktu_mulai',
		'waktu_akhir',
		'kelas',
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function question()
	{
		return $this->hasMany('App\Models\QuestionModel');
	}
	
}
