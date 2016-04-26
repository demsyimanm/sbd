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
		/*sudah*/
		if(Auth::user()->role->id == 1){
			$url = "http://localhost:5000/getUser";
    		$users = json_decode(file_get_contents($url));
			return view('admin.account.manage', compact('users'));
		}

		/*sudah*/
		else if(Auth::user()->role->id == 2){
			/*$this->data['users'] = User::where('kelas',Auth::user()->kelas)->where('role_id','!=','1')->get();*/
			$url = "http://localhost:5000/getUserKelas/".Auth::user()->kelas;
    		$users = json_decode(file_get_contents($url));
			return view('admin.account.manage', compact('users'));
		}
		return redirect('/');
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
				$this->data['kelas'] = Auth::user()->kelas;
				$this->data['user'] = Auth::user()->role->id;
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
				return redirect('admin/user');
			}
		} 

		else if(Auth::user()->role->id == 2){
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['kelas'] = Auth::user()->kelas;
				$this->data['user'] = Auth::user()->role->id;
				$this->data['role'] = Role::where('id','!=','1')->get();
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
				return redirect('admin/user');
			}
		}else {
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
				$this->data['role'] = Role::get();
				return View::make('admin.account.update', $this->data);
			} else if (Request::isMethod('post')) {
				$data = Input::all();
				
				User::where('id', $id)->update(array(
					'nama' => $data['nama'], 
					'username' => $data['username'],
					'password' => bcrypt($data['password']), 					
					'kelas' => $data['kelas'], 
					'role_id' => $data['role_id']
				));
				return redirect('admin/user');
			}
		} 
		else if( Auth::user()->role->id == 2){
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['user'] = User::find($id);
				$this->data['role'] = Role::where('id','!=','1')->get();
				return View::make('admin.account.update', $this->data);
			} else if (Request::isMethod('post')) {
				$data = Input::all();
				
				User::where('id', $id)->update(array(
					'nama' => $data['nama'], 
					'username' => $data['username'], 
					'password' => bcrypt($data['password']), 	
					'role_id' => $data['role_id']
				));
				return redirect('admin/user');
			}
		}else {
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
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2){
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['user'] = User::find($id);
				$this->data['role'] = Role::get();
				return View::make('admin.account.delete', $this->data);
			} else if (Request::isMethod('post')) {
				$data = Input::all();
				User::where('id', $id)->delete();
				return redirect('admin/user');
			}
		} else {
			return redirect('/');
		}
	}

}
