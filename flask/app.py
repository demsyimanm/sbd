#!/usr/bin/python
import json
import os
from flask import Flask, request, redirect, jsonify
import MySQLdb
import MySQLdb.cursors
import datetime
from flask.ext.cors import CORS
import urllib2


app = Flask(__name__)
CORS(app)
db = MySQLdb.connect("localhost", "root", "","sbd",cursorclass=MySQLdb.cursors.DictCursor)
cur = db.cursor()

@app.route("/home", methods=['GET'])
def home():
	if request.method == 'GET':
		return redirect("http://10.151.63.181/sbd/public",code=302)

@app.route("/getUser", methods=['GET'])
def getUser():	
	query = "SELECT u.*,p.nama as paket_nama from users u, paket p where u.paket_id = p.id"
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getUserKelas/<kelas>/", methods=['GET'])
def getUserKelas(kelas):
	query = "SELECT u.*,r.nama as role_nama from users u, role r where u.role_id = r.id and r.id!=1 and u.kelas ="+"'"+kelas+"'"
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getEvent", methods=['GET'])
def getEvent():
	query = "SELECT * from event"
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getEventByUserID/<id>/", methods=['GET'])
def getEventKelas(id):
	query = "SELECT * from event where users_id ="+id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getEventById/<id>/", methods=['GET'])
def getEventById(id):
	query = "SELECT * from event where id ="+id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getQuestionByEventId/<id>/", methods=['GET'])
def getQuestionById(id):
	query = "SELECT * from question where event_id ="+id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/startParser/<id>/", methods=['GET'])
def startParser(id):
	query = "UPDATE event set status='1' where id="+id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/stopParser/<id>/", methods=['GET'])
def stopParser(id):
	query = "UPDATE event set status='0' where id="+id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getPraktikanbyKelas/<kelas>/", methods=['GET'])
def getPraktikanbyKelas(kelas):
	query = "SELECT * from users where role_id=3 and kelas='"+kelas+"'"
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getSubmissionByQuestionId/<id>/", methods=['GET'])
def getSubmissionByQuestionId(id):
	query = "SELECT * from submission where question_id="+id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getSubmissionByQuestionIdUserId/<question_id>/<user_id>/", methods=['GET']) #gak bisa
def getSubmissionByQuestionIdUserId(question_id,user_id):
	query = "SELECT * from submission where question_id="+question_id+" and users_id="+user_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getListDB/<user_id>/", methods=['GET'])
def getListDB(user_id):
	query = "SELECT h.*, u.nama from history_upload h, users u where h.users_id = u.id and h.users_id="+user_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getListParticipant/<event_id>/", methods=['GET'])
def getListParticipant(event_id):
	query = "SELECT eu.status, u.id,u.nama, u.username, e.judul from user_event eu, event e, users u where eu.users_id = u.id and eu.event_id = e.id and eu.event_id="+event_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getUserToEvent/<event_id>", methods=['GET'])
def getUserToEvent(event_id):	
	query = "SELECT u.*,p.nama as paket_nama from users u, paket p where u.paket_id = p.id and u.id NOT IN ( SELECT users_id from user_event where event_id= "+event_id+")"
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getUserData/<user_id>", methods=['GET'])
def getUserData(user_id):	
	query = "SELECT u.nama as nama_user,u.username,p.* from users u, paket p where u.paket_id = p.id and u.id="+user_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/getLatesPayment/<user_id>", methods=['GET'])
def getLatestPayment(user_id):
	query = " select max(p.bulan) as bulan, max(p.tahun) as tahun, u.paket_id, p.paket_id, u.id from users u, payment p where u.id = p.users_id and u.paket_id = p.paket_id and u.id = "+user_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())	

@app.route("/update/paket/<user_id>/<paket_id>", methods=['GET'])
def updatePaket(user_id,paket_id):	
	now = datetime.datetime.now()
	query = "UPDATE users SET paket_id="+paket_id+" where id="+user_id
	cur.execute(query)
	db.commit()
	query2 = "INSERT INTO payment (users_id, paket_id, bulan, tahun) values ("+user_id+", "+paket_id+", '"+str(now.month)+"', '"+str(now.year)+"')"
	cur.execute(query2)
	db.commit()
	return redirect("http://10.151.63.181/CloudSBD/public/account/setting")

@app.route("/payment/<user_id>", methods=['POST'])
def payment(user_id):	
	bulan = request.form['bulan']
	tahun = request.form['tahun']
	paket_id = request.form['paket_id']
	query = "INSERT INTO payment (users_id, paket_id, bulan, tahun) values ("+user_id+", "+paket_id+", '"+bulan+"', '"+tahun+"')"
	cur.execute(query)
	db.commit()
	return redirect("http://10.151.63.181/CloudSBD/public/account/setting")

@app.route("/deleteEvent/<event_id>", methods=['GET'])
def deleteEvent(event_id):
	query = "DELETE FROm EVENT where id="+event_id
	cur.execute(query)
	db.commit()
	return redirect('http://10.151.63.181/CloudSBD/public/admin/event')	

@app.route("/deleteParticipant/<event_id>/<user_id>", methods=['GET'])
def deleteParticipant(event_id, user_id):
	query = "DELETE FROM user_event where event_id="+event_id+" and users_id="+user_id
	cur.execute(query)
	db.commit()
	return redirect('http://10.151.63.181/CloudSBD/public/event/list/peserta/'+event_id)	

@app.route("/getJudulQuestionByEventID/<event_id>", methods=['GET'])
def getJudulQuestionByEventID(event_id):
	query = "SELECT id, judul FROM question where event_id="+event_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())	

@app.route("/getQuestionByEventID/<event_id>", methods=['GET'])
def getQuestionByEventID(event_id):
	query = "SELECT * FROM question where event_id="+event_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())	

@app.route("/getQuestionByID/<quest_id>", methods=['GET'])
def getQuestionByID(quest_id):
	query = "SELECT * FROM question where id="+quest_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())	

@app.route("/deleteQuestion/<event_id>/<quest_id>", methods=['GET'])
def deleteQuestion(event_id,quest_id):
	query = "DELETE FROM question where id="+quest_id
	cur.execute(query)
	db.commit()
	return redirect('http://10.151.63.181/CloudSBD/public/admin/question/'+event_id)	


@app.route("/createEvent/<user_id>", methods=['POST'])
def createEvent(user_id):
    waktuMulai = request.form['tgl_mulai']+" "+request.form['wkt_mulai']
    waktuAkhir = request.form['tgl_akhir']+" "+request.form['wkt_akhir']
    query = "INSERT INTO event (id, judul, konten, waktu_mulai, waktu_akhir, users_id, status, db_name) VALUES (NULL, '"+request.form['judul']+"', '"+request.form['konten']+"', '"+waktuMulai+"', '"+waktuAkhir+"', '"+user_id+"', '0', '"+request.form['db_name']+"')"
    cur.execute(query)
    db.commit()
    idTerakhir = str(cur.lastrowid)
    query2 = "INSERT INTO user_event (users_id, event_id, status) VALUES ('"+user_id+"','"+idTerakhir+"',1)"
    cur.execute(query2)
    db.commit()
    queryGetMaxEvent = "SELECT MAX(id) FROM event"
    db2 = MySQLdb.connect("localhost", "root", "","sbd")
    cur2 = db2.cursor()
    cur2.execute(queryGetMaxEvent)
    row = cur2.fetchone()
    return redirect("http://10.151.63.115:2345/CloudSBD/public/admin/event/create/parser/"+str(row[0])+"/"+request.form['db_name'], code = 302)
    
    # return redirect("http://10.151.63.181/sbd/public/admin/event/create/parser/"+str(row[0])+"/"+request.form['db_name'],code=302)

@app.route("/addParticipant/<id>", methods=['POST'])
def addParticipant(id):
    if (paket == 1) or (paket ==2) :
    	query = "INSERT INTO user_event (users_id, event_id, status) VALUES '"+request.form['user']+"',"+id+","+request.form['role']
    	cur.execute(query)
    	db.commit()
    	return redirect("http://10.151.63.181/CloudSBD/public/event/list/peserta/"+id, code=302)
    else :
    	return redirect ("http://10.151.63.181/CloudSBD/public/home",code=302)

@app.route("/submitEvent/<id1>/<id2>/<id_user>", methods=['POST'])
def submit(id1,id2,id_user):
    query = "INSERT INTO submission (question_id, users_id, nilai, jawaban, status) VALUES ("+id2+","+id_user+",0,'"+request.form['jawaban']+"',0)"
    cur.execute(query)
    db.commit()
    return redirect("http://10.151.63.181/CloudSBD/public/user/question/"+id1,code=302)

@app.route("/updateEvent/<paket_id>", methods=['POST'])
def updateEvent(paket_id):
	if (paket_id == 3) or (paket_id == 4):
		return redirect("http://10.151.63.181/CloudSBD/public")

	waktu_mulai = request.form['tgl_mulai']+" "+request.form['wkt_mulai']
	waktu_akhir = request.form['tgl_akhir']+" "+request.form['wkt_akhir']
	query = "UPDATE event SET judul ='"+request.form['judul']+"', konten='"+request.form['konten']+"', waktu_mulai='"+waktu_mulai+"',waktu_akhir='"+waktu_akhir+"', db_name='"+request.form['db_name']+"'  WHERE id="+request.form['id']
	print query
	cur.execute(query)
	db.commit()
	return redirect("http://10.151.63.181/CloudSBD/public/admin/event",code=302)


#QUESTION
@app.route("/updateQuestion/<id1>/<id2>/<paket_id>", methods=['POST'])
def updateQuestion(id1, id2, paket_id):
	if (paket_id==1) or (paket_id==2):
		query = "UPDATE question SET judul = '"+request.form['judul']+"', konten= '"+request.form['konten']+"', jawaban='"+request.form['jawaban']+"'"
		cur.execute(query)
		db.commit()
		return redirect("http://10.151.63.181/CloudSBD/public/admin/question/"+id1,code=302)
	else:
		return redirect("http://10.151.63.181/CloudSBD/public/"+id1,code=302)

@app.route("/createQuestion/<id>/<paket_id>", methods=['POST'])
def createQuestion(id,paket_id):
	# print paket_id
	if (paket_id=='1' or paket_id=='2'):
		print "masuk"
		query = "INSERT INTO question (event_id, judul, konten, jawaban) VALUES("+id+",'"+request.form['judul']+"','"+request.form['konten']+"','"+request.form['jawaban']+"')"
		cur.execute(query)
		db.commit()
		return redirect("http://10.151.63.181/CloudSBD/public/admin/question/"+id,code=302)
	else :
		return redirect("http://10.151.63.181/CloudSBD/public/")

# submission

@app.route("/viewSubmission", methods=['POST'])
def viewSubmission():
	return redirect("http://10.151.63.181/CloudSBD/public/admin/event/viewSubmissionSubmit/"+request.form['event'])


    
@app.route("/getEventByParticipant/<user_id>", methods=['GET'])
def getEventByParticipant(user_id):
	query = "SELECT e.* FROM event e, user_event ue where e.id = ue.event_id and ue.users_id="+user_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())	

@app.route("/deleteDb/<db_id>/<db_name>", methods=['GET'])
def deleteDb(db_id,db_name):
	query = "DELETE FROM history_upload where id="+db_id
	cur.execute(query)
	db.commit()
	query2 = "DROP DATABASE "+db_name
	cur.execute(query2)
	db.commit()
	return redirect('http://10.151.63.181/CloudSBD/public/db')

@app.route("/createDB/<user_id>/<max_id>/<db_name>/<size>", methods=['GET'])
def createDB(user_id, max_id, db_name, size):	
	query = "INSERT INTO history_upload (users_id, namafile, db_name, size) values ("+user_id+", 'sql"+max_id+".sql', '"+db_name+"', "+size+")"
	cur.execute(query)
	db.commit()
	return redirect("http://10.151.63.181/CloudSBD/public/db/exec/"+str(db_name)+"/"+max_id)

@app.route("/kapasitasDB/<user_id>", methods=['GET'])
def kapasitasDB(user_id):	
	query = "SELECT SUM(size) as ukuran from history_upload where users_id="+user_id
	cur.execute(query)
	return jsonify(data=cur.fetchall())	

@app.route("/getTodayQueries/<user_id>/<timestamp>", methods=['GET'])
def getTodayQueries(user_id,timestamp):	
	query = "SELECT COUNT(created_at) as sum FROM submission WHERE DATE(created_at) ="+"'"+timestamp+"'"+" and users_id="+user_id
	# print query
	cur.execute(query)
	return jsonify(data=cur.fetchall())	

@app.route("/cekPayment/<user_id>/<bulan>/<tahun>", methods=['GET'])
def cekPayment(user_id,bulan,tahun):	
	query = "select * from payment where bulan = "+bulan+" and tahun = "+tahun+" and users_id="+user_id+" and paket_id = (select paket_id from users where id="+user_id+")"
	# print query
	cur.execute(query)
	return jsonify(data=cur.fetchall())	

if __name__ == "__main__":
	port = int(os.environ.get('PORT', 5000))
	app.debug = True
	app.run(host='0.0.0.0', port=port)
	





