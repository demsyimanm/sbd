<?php namespace App\Http\Controllers;
use Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->role_id == 1){
			return redirect('admin'); 
		} else if (Auth::user()->role_id == 2){
			return redirect('assistant');

		} else if (Auth::user()->role_id == 3){
			return view('user.HomeUser'); 
		}
	}


}
