from php:7.2.19-cli-alpine

RUN apk update
RUN curl --silent --show-error https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

COPY . /ms-app
WORKDIR /ms-app/app

RUN composer install --no-plugins --no-scripts
RUN composer update --no-plugins --no-scripts

ENTRYPOINT ["php", "-S", "localhost:8000"]
