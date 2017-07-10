#!/bin/bash          
NAME=php_service
docker rm -f $NAME
docker rmi -f $NAME
docker build -t $NAME .
docker run -d --rm --name $NAME -v $PWD/../../:/var/www/html -p 8080:80 $NAME
