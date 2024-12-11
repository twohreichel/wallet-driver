FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libssl-dev \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && docker-php-ext-install opcache

COPY ../conf/php.ini $PHP_INI_DIR/php.ini

WORKDIR /var/database-driver

EXPOSE 9000
CMD ["php-fpm"]