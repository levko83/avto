#! /bin/sh
echo "Simple text";
if [ -z "$1" ]
then
    /usr/bin/indexer --all --rotate;
else
    /usr/bin/indexer $1 --rotate;
fi;