<?php namespace App\Http\Controllers;

use Input;
use View;
use Auth;
use Request;
use App\Role;
use App\User;
use App\Event;
use App\Question;
use App\Submission;
use App\Http\Controllers\EventController;

class QuestionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$this->data = array();
		$url = "http://10.151.63.181:5000/getEventById/".$id;
		$this->data['eve'] = json_decode(file_get_contents($url));

		$url2 = "http://10.151.63.181:5000/getJudulQuestionByEventID/".$id;
		$this->data['judul'] = json_decode(file_get_contents($url2));

		/*$this->data['question'] = Question::where('event_id','=',$id)->get();*/

		$url3 = "http://10.151.63.181:5000/getQuestionByEventID/".$id;
		$this->data['question'] = json_decode(file_get_contents($url3));

		/*if(Auth::user()->paket->id == 1 || Auth::user()->paket->id == 2){
			return view('admin.event.question.manage',$this->data);
		}*/
		/*else if(Auth::user()->paket->id == 3){*/
			return view('user.event.question.manage',$this->data);
		/*}*/

	}

	public function indexAdmin($id)
	{
		$this->data = array();
		$url = "http://10.151.63.181:5000/getEventById/".$id;
		$this->data['eve'] = json_decode(file_get_contents($url));

		$url2 = "http://10.151.63.181:5000/getJudulQuestionByEventID/".$id;
		$this->data['judul'] = json_decode(file_get_contents($url2));

		/*$this->data['question'] = Question::where('event_id','=',$id)->get();*/

		$url3 = "http://10.151.63.181:5000/getQuestionByEventID/".$id;
		$this->data['question'] = json_decode(file_get_contents($url3));

		if(Auth::user()->paket->id == 1 || Auth::user()->paket->id == 2){
			return view('admin.event.question.manage',$this->data);
		}

	}

	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		if(Auth::user()->paket->id == 1 || Auth::user()->paket->id == 2){
			
			if (Request::isMethod('get')) {
				/*$this->data['eve'] = Event::find($id);*/
				$url = "http://10.151.63.181:5000/getEventById/".$id;
				$this->data['eve'] = json_decode(file_get_contents($url));

				return View::make('admin.event.question.create',$this->data);
			} 

			else if (Request::isMethod('post')) {
				$data = Input::all();
				
				Question::insertGetId(array(
					'event_id' => $id,
					'judul' => $data['judul'], 
					'konten' => $data['konten'], 
					'jawaban' => $data['jawaban']
				));
				return redirect('admin/question/'.$id);
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

	public function submit($id1,$id2)
	{
		$data = Input::all();
		
		Submission::insertGetId(array(
				'question_id' => $id2,
				'users_id' => Auth::user()->id,
				'nilai' => '0', 
				'jawaban' => $data['jawaban'], 
				'status' => "0"
		));
		return redirect('user/question/'.$id1);
	}

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
	public function update($id1,$id2)
	{
		if(Auth::user()->paket->id == 1 || Auth::user()->paket->id == 2){
			if (Request::isMethod('get')) {
				$this->data = array();
				/*$this->data['eve'] = Event::find($id1);*/
				$url = "http://10.151.63.181:5000/getEventById/".$id1;
				$this->data['eve'] = json_decode(file_get_contents($url));

				/*$this->data['quest'] = Question::find($id2);*/
				$url = "http://10.151.63.181:5000/getQuestionByID/".$id2;
				$this->data['quest'] = json_decode(file_get_contents($url));
				return View::make('admin.event.question.update', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				
				Question::where('id', $id2)->update(array(
					'judul' => $data['judul'], 
					'konten' => $data['konten'], 
					'jawaban' => $data['jawaban']
				));
				return redirect('admin/question/'.$id1);
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
	public function destroy($id1,$id2)
	{
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2){
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['eve'] = Event::find($id1);
				$this->data['quest'] = Question::find($id2);
				return View::make('admin.event.question.delete', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				Question::where('id', $id2)->delete();
				return redirect('admin/question/'.$id1);
			}
		} else {
			return redirect('/');
		}
	}

}
