from php:7.2-apache

# update and install git, zip and unzip for install composer
RUN apt-get update
RUN apt-get -y install git zip unzip
RUN curl --silent --show-error https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Copy files to container
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY . /var/www/html/core
WORKDIR /var/www/html/core/app

# install composer
RUN composer install --no-plugins --no-scripts
# Enable rewrite in apache2
RUN a2enmod rewrite
