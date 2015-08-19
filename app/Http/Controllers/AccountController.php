<?php namespace App\Http\Controllers;

use Input;
use View;
use Auth;
use Request;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;

class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['users'] = User::get();
		return view('admin.account.manage', $this->data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->role->id == 1){
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['role'] = Role::get();
				return View::make('admin.account.create', $this->data);
			} else if (Request::isMethod('post')) {
				$data = Input::all();
				
				User::insertGetId(array(
					'nama' => $data['nama'], 
					'username' => $data['username'], 
					'password' => bcrypt($data['password']), 
					'kelas' => $data['kelas'], 
					'role_id' => $data['role_id']
				));
			}
		} else {
			return redirect('/');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Auth::user()->role->id == 1){
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['user'] = User::find($id);
				dd($this->data);
				return View::make('admin.account.update', $this->data);
			} else if (Request::isMethod('post')) {
				$data = Input::all();
				
				User::insertGetId(array(
					'nama' => $data['nama'], 
					'username' => $data['username'], 
					'password' => bcrypt($data['password']), 
					'kelas' => $data['kelas'], 
					'role_id' => $data['role_id']
				));
			}
		} else {
			return redirect('/');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
