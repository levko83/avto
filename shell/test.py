#!/usr/bin/env python
import os
dir_of_backup = "/var/www/ponzps26/data/www/new.extraload.com.ua/sxd/backup"
for name in os.listdir(dir_of_backup):
	print name
	#fullname = os.path.join(dir_of_backup, name)
    #if os.path.isfile(fullname):
    #    print fullname


rsync --ignore-existing root@77.72.129.179:/var/www/ponzps26/data/www/new.extraload.com.ua/sxd/backup/*.sql.gz /var/www/test
