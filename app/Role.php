<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model
{
    use SoftDeletes;

	protected $table = 'role';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'nama',
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function user()
	{
		return $this->hasMany('App\Models\UserModel');
	}
}
