FROM ubuntu:20.04
MAINTAINER Shubhampwr885@gmail.com

WORKDIR /var/www/html
RUN apt update -y
RUN apt install vim -y

#Install Php
RUN apt-get install -y php-fpm php-mysql php-gd
RUN service php7.4-fpm restart
ADD php/index.php  /var/www/html


# Install Nginx
RUN apt install nginx -y 
ADD php/default /etc/nginx/sites-available/default
RUN service nginx restart

#Install Mariadb
RUN apt install mariadb-server -y

#Source code
RUN mkdir -p space
ADD nginxstart.sh space
RUN chmod +x space/start.sh
CMD [ "bash" , "-x" , "space/nginxstart.sh" ]

#Exposing Port
EXPOSE 80





