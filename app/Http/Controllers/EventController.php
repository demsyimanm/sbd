<?php 
namespace App\Http\Controllers;

/*use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
*/
use Input;
use View;
use Auth;
use Request;
use App\Role;
use App\User;
use App\Event;
use App\Http\Controllers\EventController;

class EventController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->role->id == 1){
			$this->data['event'] = Event::get();
			return view('admin.event.manage',$this->data);
		}

		else if (Auth::user()->role->id == 2)
		{
			$this->data['event'] = Event::where('kelas','=',Auth::user()->kelas)->get();
			return view('admin.event.manage',$this->data);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->role->id == 1){
			$this->data['user'] = Auth::user()->role->id;
			$this->data['kelas'] = "";
			if (Request::isMethod('get')) {
				return View::make('admin.event.create',$this->data);
			} 

			else if (Request::isMethod('post')) {
				$data = Input::all();
				$data['waktu_mulai'] = $data['tgl_mulai']." ".$data['wkt_mulai'];
				$data['waktu_akhir'] = $data['tgl_akhir']." ".$data['wkt_akhir'];
				Event::insertGetId(array(
					'judul' => $data['judul'], 
					'konten' => $data['konten'], 
					'waktu_mulai' => $data['waktu_mulai'], 
					'waktu_akhir' => $data['waktu_akhir'],
					'kelas' => $data['kelas']
				));
				return redirect('admin/event');
			}
		} 

		else if (Auth::user()->role->id == 2)
		{
			$this->data['kelas'] = Auth::user()->kelas;
			$this->data['user'] = Auth::user()->role->id;
			if (Request::isMethod('get')) {
				return View::make('admin.event.create',$this->data);
			} 

			else if (Request::isMethod('post')) {
				$data = Input::all();
				$data['waktu_mulai'] = $data['tgl_mulai']." ".$data['wkt_mulai'];
				$data['waktu_akhir'] = $data['tgl_akhir']." ".$data['wkt_akhir'];
				Event::insertGetId(array(
					'judul' => $data['judul'], 
					'konten' => $data['konten'], 
					'waktu_mulai' => $data['waktu_mulai'], 
					'waktu_akhir' => $data['waktu_akhir'],
					'kelas' => $this->data['kelas']
				));
				return redirect('admin/event');
			}

		}
		else {
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
		if(Auth::user()->role->id == 1 ){
			$this->data = array();
			$this->data['user'] = Auth::user()->role->id;
			$this->data['kelas'] = "";
			$this->data['eve'] = Event::find($id);
			if (Request::isMethod('get')) {
				return View::make('admin.event.update', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				$data['waktu_mulai'] = $data['tgl_mulai']." ".$data['wkt_mulai'];
				$data['waktu_akhir'] = $data['tgl_akhir']." ".$data['wkt_akhir'];
				Event::where('id', $id)->update(array(
					'judul' => $data['judul'], 
					'konten' => $data['konten'], 
					'waktu_mulai' => $data['waktu_mulai'], 
					'waktu_akhir' => $data['waktu_akhir'],
					'kelas' => $data['kelas']
				));
				return redirect('admin/event');
			}
		} 
	
		else if(Auth::user()->role->id == 2){
			$this->data = array();
			$this->data['kelas'] = Auth::user()->kelas;
			$this->data['user'] = Auth::user()->role->id;
			$this->data['eve'] = Event::find($id);
			if (Request::isMethod('get')) {
				return View::make('admin.event.update', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				$data['waktu_mulai'] = $data['tgl_mulai']." ".$data['wkt_mulai'];
				$data['waktu_akhir'] = $data['tgl_akhir']." ".$data['wkt_akhir'];
				Event::where('id', $id)->update(array(
					'judul' => $data['judul'], 
					'konten' => $data['konten'], 
					'waktu_mulai' => $data['waktu_mulai'], 
					'waktu_akhir' => $data['waktu_akhir'],
					'kelas' => $this->data['kelas']
				));
				return redirect('admin/event');
			}
		} 
		else {
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
				$this->data['eve'] = Event::find($id);
				return View::make('admin.event.delete', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				Event::where('id', $id)->delete();
				return redirect('admin/event');
			}
		} else {
			return redirect('/');
		}
	}

}
