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

		else if (Auth::user()->role->id == 2 )
		{
			$this->data['event'] = Event::where('kelas','=',Auth::user()->kelas)->get();
			return view('admin.event.manage',$this->data);
		}
		elseif (Auth::user()->role->id == 3) {
			$this->data['event'] = Event::where('kelas','=',Auth::user()->kelas)->get();
			return view('user.event.manage',$this->data);		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2){
			$this->data['user'] = Auth::user()->role->id;
			$this->data['kelas'] = Auth::user()->kelas;
			if (Request::isMethod('get')) {
				return View::make('admin.event.create',$this->data);
			} 

			else if (Request::isMethod('post')) {
				$data = Input::all();
				$max_id = Event::max('id');
				$max_id += 1;
				$data['waktu_mulai'] = $data['tgl_mulai']." ".$data['wkt_mulai'];
				$data['waktu_akhir'] = $data['tgl_akhir']." ".$data['wkt_akhir'];
				Event::insertGetId(array(
					'judul' => $data['judul'], 
					'konten' => $data['konten'], 
					'waktu_mulai' => $data['waktu_mulai'], 
					'waktu_akhir' => $data['waktu_akhir'],
					'kelas' => $data['kelas'],
					'ip' => $data['ip'],
					'db_username' => $data['conn_username'],
					'db_password' => $data['conn_password'],
					'db_name' => $data['db_name']
				));
				$temp_file = "parser_".$max_id.".py";
				$file = fopen("../parser/parser_".$max_id.".py", "wb") or die("Unable to open file!");
				$content = "#!/usr/bin/python
import MySQLdb
import time
import sys
try:
  db_kunci= MySQLdb.connect(".'"'.$data['ip'].'"'.", ".'"'.$data['conn_username'].'"'.", ".'"'.$data['conn_password'].'"'.", ".'"'.$data['db_name'].'"'.")
  cursor_kunci = db_kunci.cursor()
  while True:
    db= MySQLdb.connect('localhost', 'root', 'komputer,.oyeoye', 'sbd')
    cursor = db.cursor()
    
    try:
     sql = '''select id, question_id, users_id, jawaban,status from submission where status = 0 having id = min(id)'''
     cursor.execute(sql)
     unchecked = cursor.fetchone()
     sub_id = ''
     ques_id = ''
     user_id = ''
     ans = ''
     stat = ''
     tanda = 0

     while unchecked is not None:
         sub_id = unchecked[0]
         ques_id = unchecked[1]
         user_id = unchecked[2]
         ans = unchecked[3]
         stat = unchecked[4]
         unchecked = cursor.fetchone()


     if (sub_id!='') : 
         tanda = 1

     if (tanda==1):
         cursor_kunci.execute(ans)
         results = cursor_kunci.fetchall()
         num_fields = len(cursor_kunci.description)
         
         hasil=[[0 for x in range(num_fields)] for x in range(5000)]
         rows=0
         for res in results:
             for column in range(num_fields):
                 hasil[rows][column] = res[column]
             rows+=1

         kunci = '''select jawaban from question where id='''+ str(ques_id)
         cursor.execute(kunci)
         temp = cursor.fetchone()
         while temp is not None:
             temp_kunci = temp[0]
             temp = cursor.fetchone()
         cursor_kunci.execute(temp_kunci)
         res_kunci = cursor_kunci.fetchall()
         num_fields_1 = len(cursor_kunci.description)
         arr_kunci=[[0 for x in range(num_fields_1)] for x in range(5000)]
         row_kunci=0
         for res_key in res_kunci:
             for column_kunci in range(num_fields_1):
                 arr_kunci[row_kunci][column_kunci] = res_key[column_kunci]
             row_kunci+=1
         flag=0
         if (num_fields != num_fields_1): 
            flag=1
            
         if (rows != row_kunci): 
            flag=1
            

         if (flag==0):
             for row_compare in range(row_kunci):
                 for column_compare in range(num_fields):
                     if (hasil[row_compare][column_compare]!=arr_kunci[row_compare][column_compare]):
                         print hasil[row_compare][column_compare]
                         print arr_kunci[row_compare][column_compare]
                         flag=1
             
         if (flag==1): 
             update1 = '''update submission set nilai = 0, status = 1 where id = '''+str(sub_id)
             cursor.execute(update1)
             db.commit()
             #print 'try'
             print 'query failed'

         elif (flag==0): 
             update2 = '''update submission set nilai = 100, status = 1 where id = '''+str(sub_id)
             cursor.execute(update2)
             db.commit()
             print 'query success'

    except:
        db.rollback()
        update1 = '''update submission set nilai = 0, status = 1 where id = '''+str(sub_id)
        cursor.execute(update1)
        db.commit()
        print 'enter except'
        print 'query failed'
    time.sleep(1)
    db.close()
  db_kunci.close()
except KeyboardInterrupt:
  sys.exit(0)
except:
  print 'berhenti'
  execfile(".$temp_file.")";
				fwrite($file, $content);
				fclose($file);
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
					'kelas' => $this->data['kelas'],
					'ip' => $data['ip'],
					'conn_username' => $data['conn_username'],
					'conn_password' => $data['conn_password'],
					'db_name' => $data['db_name']
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
	public function parserStart($id)
	{
		Event::where('id', $id)->update(array(
			'status' => '1'
		));
		//http_get("http://localhost:3000/start?id=".$id);
		return redirect("http://localhost:3000/start?id=".$id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function ParserStop($id)
	{
		Event::where('id', $id)->update(array(
			'status' => '0'
		));
		return redirect("http://localhost:3000/stop?id=".$id);
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
					'kelas' => $data['kelas'],
					'ip' => $data['ip'],
					'conn_username' => $data['conn_username'],
					'conn_password' => $data['conn_password'],
					'db_name' => $data['db_name']
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
					'kelas' => $this->data['kelas'],
					'ip' => $data['ip'],
					'conn_username' => $data['conn_username'],
					'conn_password' => $data['conn_password'],
					'db_name' => $data['db_name']
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
