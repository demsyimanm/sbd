<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Event;
class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta'); // CDT
		$current_date = date('Y-m-d H:i:s');

		if (Auth::user()->role->id == 1)
		{
			$this->data['nearest'] = Event::where('waktu_mulai','>=',$current_date)->min('waktu_mulai');
		}

		else if (Auth::user()->role->id == 2)
		{
			$kelas = Auth::user()->kelas;
			$this->data['nearest'] = Event::where('kelas','=',$kelas)->where('waktu_mulai','>=',$current_date)->min('waktu_mulai');
		}
		$this->data['event'] = Event::where('waktu_mulai','=',$this->data['nearest'])->get();
		$this->data['nearest'] = date('m/d/Y H:i:s', strtotime($this->data['nearest']));
		return view('admin.HomeAdmin',$this->data);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	public function calendar()
	{
		return view ('admin.CalendarAdmin');
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
		//
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
