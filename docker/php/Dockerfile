
FROM php:7.3-fpm-alpine


COPY . /var/www/

USER root

RUN cp .env.example .env \
    && set -xe \
    && composer install --no-dev --no-scripts --no-suggest --no-interaction --prefer-dist --optimize-autoloader \
    && composer dump-autoload --no-dev --optimize --classmap-authoritative

USER www-data