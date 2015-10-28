#!/usr/bin/python
import  MySQLdb

a=0
while (1):
  db= MySQLdb.connect(host="localhost", # your host, usually localhost
                     user="sbd", # your username
                      passwd="", # your password
                      db="sbd")
  cursor = db.cursor()
  try:
   sql = """select id, question_id, users_id, jawaban,status from submission where status = 0 having id = min(id)"""
   cursor.execute(sql)
   unchecked = cursor.fetchone()
   sub_id = ""
   ques_id = ""
   user_id = ""
   ans = ""
   stat = ""
   tanda = 0
   while unchecked is not None:
       sub_id = unchecked[0]
       ques_id = unchecked[1]
       user_id = unchecked[2]
       ans = unchecked[3]
       stat = unchecked[4]
       unchecked = cursor.fetchone()

   if (sub_id!="") : tanda = 1

   '''print sub_id
   print ques_id
   print user_id
   print ans
   print stat'''
   if (tanda==1):
       cursor.execute(ans)
       results = cursor.fetchall()
       num_fields = len(cursor.description)
       hasil=[[0 for x in range(num_fields)] for x in range(5000)]
       rows=0
       for res in results:
           for column in range(num_fields):
               hasil[rows][column] = res[column]
           rows+=1

       '''for row in range(rows):
           for column in range(num_fields):
             print hasil[row][column]'''


       kunci = """select jawaban from question where id="""+ str(ques_id)
       cursor.execute(kunci)
       temp = cursor.fetchone()
       while temp is not None:
           temp_kunci = temp[0]
           temp = cursor.fetchone()
       
       
       cursor.execute(temp_kunci)
       res_kunci = cursor.fetchall()
       num_fields_1 = len(cursor.description)
       arr_kunci=[[0 for x in range(num_fields_1)] for x in range(5000)]
       row_kunci=0
       for res_key in res_kunci:
           for column_kunci in range(num_fields_1):
               arr_kunci[row_kunci][column_kunci] = res_key[column_kunci]
           row_kunci+=1
       
       '''for row in range(row_kunci):
           for column in range(num_fields_1):
             print arr_kunci[row_kunci][column_kunci]'''

       flag=0
       if (num_fields != num_fields_1): flag=1
       if (rows != row_kunci): flag=1

       if (flag==0):
           for row_compare in range(row_kunci):
               for column_compare in range(num_fields):
                   if (hasil[row_compare][column_compare]!=arr_kunci[row_compare][column_compare]):
                       flag=1
           
       if (flag==1): 
           update1 = """update submission set nilai = 0, status = 1 where id = """+str(sub_id)
           cursor.execute(update1)
           db.commit()
           print "query failed"

       elif (flag==0): 
           update2 = """update submission set nilai = 100, status = 1 where id = """+str(sub_id)
           cursor.execute(update2)
           db.commit()
           print "query success"
  except:
      db.rollback()
      update1 = """update submission set nilai = 0, status = 1 where id = """+str(sub_id)
      cursor.execute(update1)
      db.commit()
      print "query failed"

db.close()
# disconnect from server
  # Now print fetched result
      #print "nama=%s,username=%s,kelas=%s,role_id=%s" % \
            #(nama, username, kelas, role_id)