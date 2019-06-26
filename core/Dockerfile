from php:7.2-apache

RUN apt-get update
RUN apt-get -y install git zip unzip
RUN apt-get -y install vim
RUN curl --silent --show-error https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

COPY . /var/www/html/core
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
WORKDIR /var/www/html/core/app

RUN composer install --no-plugins --no-scripts

RUN a2enmod rewrite
#RUN composer update --no-plugins --no-scripts
