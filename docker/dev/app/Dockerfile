# Development build
FROM composer:2.5.7 as build-dev-composer

WORKDIR /app

RUN mkdir -p bootstrap/cache

COPY . .
RUN composer install

##########################################################
# Dev build frontend
FROM node:20-alpine3.18 as build-testing-node

WORKDIR /app

RUN mkdir -p public/

COPY package*.json webpack.mix.js /app/
RUN npm ci

COPY . .
RUN npm run prod

##########################################################
# Development app
FROM php:8.2-fpm-alpine3.18 as app-dev

ARG user=loltesting
# Most users are 1000 UID, use ARG if it's different...
ARG uid=1000
RUN adduser -u $uid -D $user

WORKDIR /var/www

# Install system deps
RUN apk update && apk add \
    libzip-dev \
    mariadb-client

# Clear cache
RUN apk cache clean && \
    rm -rf /var/lib/apk/lists/* && \
    rm -rf /var/cache/apk/*

# Install needed PHP extensions
RUN docker-php-ext-configure opcache --enable-opcache && \
	docker-php-ext-install pdo_mysql zip

# Set move OPCache config
COPY docker/dev/app/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Copy project to container
COPY . .
COPY --from=build-dev-composer /app/vendor ./vendor
COPY --from=build-dev-composer /app/bootstrap ./bootstrap

RUN chown -R $user:$user /var/www

RUN rmdir /var/www/html

USER $user

