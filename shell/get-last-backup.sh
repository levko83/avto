#!/bin/bash
. ./variables.sh
expect << END
	spawn rsync --progress --ignore-existing $REMOTE_USER@$REMOTE_HOST:$REMOTE_BACKUP_DIR/*.sql.gz $LOCAL_BACKUP_DIR
	expect "assword:"
	send "$REMOTE_PASS\n"	
	expect eof 
END