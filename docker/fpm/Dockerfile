FROM php:8.0.2-fpm

RUN apt-get update && apt-get install -y libzip-dev

RUN docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ADD composer.json composer.lock /var/www/mvc/

WORKDIR /var/www/mvc/
CMD composer install;php-fpm