<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Request;
use Auth;
use Input;
use App\Event;
use App\User;
use App\Question;
use App\Submission;

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
	public function scoreboards()
	{
		if (Auth::user()->role->id == 1)
		{
			if (Request::isMethod('get')) {
				# code...
				/*$this->data['event'] = Event::get();*/
				$url = "http://localhost:5000/getEvent";
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
				$kelas = Auth::user()->kelas;
				/*$this->data['event'] = Event::where('kelas','=',$kelas)->get();*/
				$url = "http://localhost:5000/getEventKelas/".Auth::user()->kelas;
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
			$url = "http://localhost:5000/getEventKelas/".Auth::user()->kelas;
    		$events = json_decode(file_get_contents($url));
			return view('admin.scoreboard.index',compact('events'));
		} else {
			$id = Input::get('event');
			return redirect('user/scoreboard/'.$id);
		}
	}

	public function scoreboard($id)
	{
		/*$event = Event::find($id);*/
		
		$url = "http://localhost:5000/getEventById/".$id;
    	$event = json_decode(file_get_contents($url));
    	//dd($event);
    	/*dd($event->data[0]->id);*/
		$nilai = array();
		/*$user = User::where('kelas',$event->kelas)->where('role_id', 3)->get();*/
		$url = "http://localhost:5000/getPraktikanbyKelas/".$event->data[0]->kelas;
    	$user = json_decode(file_get_contents($url));
		/*$question = Question::where('event_id', $id)->get();*/
		$url = "http://localhost:5000/getQuestionByEventId/".$id;
    	$question = json_decode(file_get_contents($url));
		foreach ($question->data as $quest) {
			/*$submission = Submission::where('question_id',$quest->id)->get();*/
			$url = "http://localhost:5000/getSubmissionByQuestionId/".$quest->id;
    		$submission = json_decode(file_get_contents($url));
			foreach ($submission->data as $sub) {
				foreach ($user->data as $use) {
					$nilai[$use->username][$sub->question_id] = 0;
				}
			}
		}
		foreach ($question->data as $quest) {
			foreach ($user->data as $use) {
				/*$submission = Submission::where('question_id',$quest->id)->where('users_id',$use->id)->max('nilai');*/
				$url = "http://localhost:5000/getSubmissionByQuestionIdUserId/".$quest->id."/".$use->id;
    			$submission = json_decode(file_get_contents($url));
				if($submission->data) $nilai[$use->username][$quest->id] = $submission;
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
