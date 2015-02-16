#!/usr/bin/python
import MySQLdb,argparse

parser = argparse.ArgumentParser()
group = parser.add_mutually_exclusive_group()
group.add_argument("-u", "--update", help="update the DB", action="store_true")
group.add_argument("-c", "--clear", help="clear the DB", action="store_true")
args = parser.parse_args()


def updateDB():
	for line in inputfile:
		splitline = line.split(',')
		print splitline
		print splitline[0]
		print splitline[1]

		cursor = db.cursor()

		sql = """INSERT INTO TESTENTRIES(FIRST,
				 SECOND)
				 VALUES ('%s', '%s')""" % \
				 (splitline[0],splitline[1])

		try:
			cursor.execute(sql)
			db.commit()
		except:
			db.rollback()

def clearDB():

	cursor = db.cursor()
	
	sql = """DELETE FROM TESTENTRIES"""

	try:
		cursor.execute(sql)
		db.commit()
	except:
		db.rollback()



inputfile = open("test.csv", 'r')
host = "localhost"
user = "josh"
password = "roccolikesd"

db = MySQLdb.connect(host,user,password,"test")

if args.update:
    updateDB()
elif args.clear:
	clearDB()
else:
	print "nothing was done!"


db.close()

