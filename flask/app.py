import json
import os
from flask import Flask, request, redirect, jsonify
import MySQLdb
import MySQLdb.cursors
from flask.ext.cors import CORS

app = Flask(__name__)
CORS(app)
db = MySQLdb.connect("localhost", "root", "","sbd",cursorclass=MySQLdb.cursors.DictCursor)
cur = db.cursor()

@app.route("/home", methods=['GET'])
def home():
	if request.method == 'GET':
		return redirect("http://localhost/sbd/public",code=302)

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

if __name__ == "__main__":
	port = int(os.environ.get('PORT', 5000))
	app.debug = True
	app.run(host='0.0.0.0', port=port)
	





