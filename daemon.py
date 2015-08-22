#!/usr/bin/python
import  MySQLdb
db= MySQLdb.connect("10.151.12.202", "sbdoj", "pass", "sbdoj")
cursor = db.cursor()


sql = """select nama, username, kelas, role_id from users"""
r=db.use_result()

try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   num_fields = len(cursor.description)
   print "length=%s" % \
   		(num_fields)
   	
   for row in results:
      nama = row[0]
      username = row[1]
      kelas = row[2]
      role_id = row[3]
      # Now print fetched result
      print "nama=%s,username=%s,kelas=%s,role_id=%s" % \
      		(nama, username, kelas, role_id)
except:
   print "Error: unable to fetch data"

# disconnect from server
db.close()