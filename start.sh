#!/bin/bash

service php7.4-fpm restart
service nginx restart

#Database config
service mysql start
echo " SET PASSWORD FOR 'root'@'localhost' = PASSWORD('prime123#');" | mysql 
echo "flush privileges;" | mysql -uroot -pprime123#
echo "create database prime;" | mysql -uroot -pprime123#
echo "CREATE TABLE numberinfo ( no INT(6) , type VARCHAR(30) NOT NULL);" | mysql -uroot -pprime123# prime
service mysql restart

tail -f /dev/null 