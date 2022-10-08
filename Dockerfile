FROM php:8.1-apache

RUN apt-get update \
        && docker-php-ext-install -j$(nproc) \
        dom \
        curl 