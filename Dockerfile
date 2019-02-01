FROM composer as backend

WORKDIR /app

COPY composer.json composer.lock /app/
RUN composer install  \
    --ignore-platform-reqs \
    --no-ansi \
    --no-autoloader \
    --no-dev \
    --no-interaction \
    --no-scripts

COPY . /app/
RUN composer dump-autoload --no-dev --optimize --classmap-authoritative
RUN cd /app/ composer update

FROM php:7.2-apache

RUN apt-get update  && apt-get install -y git vim curl debconf subversion git apt-transport-https apt-utils zlib1g-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql \
    && chown -R www-data:www-data /var/www/ \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

COPY --from=backend /app  /var/www

VOLUME ${PWD}: /var/www
COPY /docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY /docker/php/php.ini $PHP_INI_DIR
COPY /docker/php/php.ini /usr/local/php
COPY /docker/php/php.ini /usr/local/lib/php/
RUN chmod -R 777 /var/www


WORKDIR /var/www