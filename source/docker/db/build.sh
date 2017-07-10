#!/bin/bash          
NAME=mysql_db
docker rm -f $NAME
docker rmi -f $NAME
docker build -t $NAME .
docker run -d --rm --name $NAME -v $PWD/datadir:/var/lib/mysql -p 3306:3306 $NAME
