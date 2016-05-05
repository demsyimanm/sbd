<?php 
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nama', 'username', 'password','paket_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function submission()
	{
		return $this->hasMany('App\Submission');
	}

	public function paket()
	{
		return $this->belongsTo('App\Paket');
	}

	public function payment()
	{
		return $this->hasMany('App\Payment');
	}

	public function event()
	{
		return $this->hasMany('App\Event');
	}

	public function user_event()
	{
		return $this->hasMany('App\User_Event');
	}

	public function history_upload()
	{
		return $this->hasMany('App\History_Upload');
	}
}
