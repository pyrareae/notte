FROM php:fpm

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY php.ini /tmp
RUN mv "/tmp/php.ini" "$PHP_INI_DIR/php.ini"