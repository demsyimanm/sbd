<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Request;
use Auth;
use Input;
use App\Event;
use App\User;
use App\Question;
use App\Submission;
use App\User_Event;
use DB;

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

		if (Auth::user()->paket->id == 1)
		{
			$this->data['nearest'] = Event::where('waktu_mulai','>=',$current_date)->min('waktu_mulai');
		}

		else if (Auth::user()->paket->id == 2)
		{
			$this->data['nearest'] = Event::where('waktu_mulai','>=',$current_date)->min('waktu_mulai');
		}
		$this->data['event'] = Event::where('waktu_mulai','=',$this->data['nearest'])->first();
		$this->data['nearest'] = date('m/d/Y H:i:s', strtotime($this->data['nearest']));
		return view('admin.HomeAdmin',$this->data);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function scoreboards()
	{
		if (Auth::user()->paket->id == 4)
		{
			if (Request::isMethod('get')) {
				# code...
				/*$this->data['event'] = Event::get();*/
				$url = "http://10.151.63.181:5000/getEvent/".Auth::user()->id;
    			$events = json_decode(file_get_contents($url));
				return view('admin.scoreboard.index',compact('events'));
			} else {
				$id = Input::get('event');
				return redirect('admin/scoreboard/'.$id);
			}
		}

		else 
		{
			if (Request::isMethod('get')) {
				# code...
				/*$this->data['event'] = Event::where('kelas','=',$kelas)->get();*/
				$url = "http://10.151.63.181:5000/getEventByParticipant/".Auth::user()->id;
    			$events = json_decode(file_get_contents($url));
				return view('admin.scoreboard.index',compact('events'));
			} else {
				$id = Input::get('event');
				return redirect('admin/scoreboard/'.$id);
			}
		}
	}

	public function scoreboardsUser()
	{
		if (Request::isMethod('get')) {
			# code...
			$kelas = Auth::user()->kelas;
			/*$this->data['event'] = Event::where('kelas','=',$kelas)->get();*/
			$url = "http://10.151.63.181:5000/getEventKelas/".Auth::user()->kelas;
    		$events = json_decode(file_get_contents($url));
			return view('admin.scoreboard.index',compact('events'));
		} else {
			$id = Input::get('event');
			return redirect('user/scoreboard/'.$id);
		}
	}

	public function scoreboard($id)
	{
		$event = Event::find($id);
		
		/*$url = "http://10.151.63.181:5000/getEventById/".$id;
    	$event = json_decode(file_get_contents($url));*/

		$nilai = array();

		$user = DB::select('SELECT u.*,p.nama as paket_nama from users u, paket p where u.paket_id = p.id and u.id IN ( SELECT users_id from user_event where event_id='.$id.')');
		/*$url = "http://10.151.63.181:5000/getUserToEvent/".$id;
    	$user = json_decode(file_get_contents($url));*/
		$question = Question::where('event_id', $id)->get();
		/*$url = "http://10.151.63.181:5000/getQuestionByEventId/".$id;
    	$question = json_decode(file_get_contents($url));*/
		foreach ($question as $quest) {
			$submission = Submission::where('question_id',$quest->id)->get();
			/*$url = "http://10.151.63.181:5000/getSubmissionByQuestionId/".$quest->id;
    		$submission = json_decode(file_get_contents($url));*/
			foreach ($submission as $sub) {
				foreach ($user as $use) {
					$nilai[$use->username][$sub->question_id] = 0;
				}
			}
		}
		foreach ($question as $quest) {
			foreach ($user as $use) {
				$submission = Submission::where('question_id',$quest->id)->where('users_id',$use->id)->max('nilai');
				/*$url = "http://10.151.63.181:5000/getSubmissionByQuestionIdUserId/".$quest->id."/".$use->id;
    			$submission = json_decode(file_get_contents($url));*/
				if($submission) $nilai[$use->username][$quest->id] = $submission;
				else $nilai[$use->username][$quest->id] = 0;
			}
		}
		foreach ($nilai as $key => $value) {
			$nilai[$key]['total'] = 0;
			foreach ($value as $val) {
				$nilai[$key]['total'] += $val;
			}
		}
		$this->data['question'] = $question;
		$this->data['user'] = $user;
		$this->data['nilai'] = $nilai;
		$this->data['id'] = $id;
		$this->data['event'] = $event;
		//var_dump($this->data);
		//break;
		return view('admin.scoreboard.board',$this->data);
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
	public function refresh($id)
	{
		if (Request::isMethod('get')) {
            if (Request::ajax()) {
                {
                    $event = Event::find($id);
					$nilai = array();
					$user = User::where('kelas',$event->kelas)->where('role_id', 3)->get();
					$question = Question::where('event_id', $id)->get();
					foreach ($question as $quest) {
						$submission = Submission::where('question_id',$quest->id)->get();
						foreach ($submission as $sub) {
							foreach ($user as $use) {
								$nilai[$use->username][$sub->question_id] = 0;
							}
						}
					}
					foreach ($question as $quest) {
						foreach ($user as $use) {
							$submission = Submission::where('question_id',$quest->id)->where('users_id',$use->id)->max('nilai');
							if($submission) $nilai[$use->username][$quest->id] = $submission;
							else $nilai[$use->username][$quest->id] = 0;
						}
					}
					foreach ($nilai as $key => $value) {
						$nilai[$key]['total'] = 0;
						foreach ($value as $val) {
							$nilai[$key]['total'] += $val;
						}
					}

                        return json_encode($nilai);
                }
            }
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

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
