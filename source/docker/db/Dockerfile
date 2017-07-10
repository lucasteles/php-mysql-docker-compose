FROM mysql:5.6

ENV MYSQL_ROOT_PASSWORD 1234
ENV MYSQL_DATABASE FRUITS
VOLUME /var/lib/mysql
ADD ./dump/_schema.sql /docker-entrypoint-initdb.d
ADD ./dump/data/ /docker-entrypoint-initdb.d

EXPOSE 3306




