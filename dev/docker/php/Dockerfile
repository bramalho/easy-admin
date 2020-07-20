FROM php:7.4.8-fpm-alpine3.12

RUN apk update \
 && apk add --no-cache \
    build-base \
    autoconf \
    bash \
    git \
    zip \
    unzip \
    openssl-dev

RUN docker-php-ext-install opcache pdo_mysql mysqli
RUN docker-php-ext-enable opcache

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require hirak/prestissimo

CMD ["php-fpm", "-F"]

WORKDIR /var/www/app

EXPOSE 9000
