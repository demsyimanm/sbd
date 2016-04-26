import json
from flask import Flask, request
app = Flask(__name__)

data = [{'id':1,'nama' : 'tas1'},{'id':2,'nama' : 'tas2'}]


@app.route("/tas", methods=['GET','POST','DELETE'])
def home():
	if request.method == 'GET':
		return 'http://10.151.34.15/sbd/public/auth/login'

def tas():
	if request.method == 'GET':
		return json.dumps(data)
	if request.method == 'POST':
		newid = request.form['id']
		newnama = request.form['nama']
		for member in data :
			if str(member['id']) == newid :
				return json.dumps({'error':'duplicate data'})
		data.append({'id':newid,'nama':newnama})
		return json.dumps({'succes':'data inserted'})
	if request.method == 'DELETE':
		del data[:]
		return json.dumps({'success':'all data deleted'})




@app.route("/tas/<id>/", methods=['GET','DELETE','PUT'])
def tas_byId(id):
	if request.method == 'GET':
	    for member in data :
	    	if str(member['id']) == id :
	    	  return json.dumps(member)
	    return json.dumps({'error':'data not found'})

	if request.method == 'DELETE':
	    for member in data :
    	        if str(member['id']) == id :
    	        	data.remove(member)
    	        	return json.dumps({'sucess':'data '+id +' deleted'})
		return json.dumps({'error':'data not found'})
	
	if request.method == 'PUT':
		for member in data :
			if str(member['id']) == id :
				member['nama'] = request.form['nama']
				return json.dumps({'sucess':'data '+id +' has been modified'})
		return json.dumps({'error':'data not found'})

if __name__ == "__main__":
	app.run()
	app.debug = True




