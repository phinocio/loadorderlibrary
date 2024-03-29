# Production Build
FROM composer:2.5.7 as build-prod-composer

WORKDIR /app

RUN mkdir -p bootstrap/cache

COPY . .
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction

##########################################################
# Production build frontend
FROM node:20-alpine3.18 as build-prod-node

WORKDIR /app

RUN mkdir -p public/

COPY package*.json webpack.mix.js /app/
RUN npm ci

COPY . .
RUN npm run prod

##########################################################
# Production App
FROM php:8.2-fpm-alpine3.18 as app-prod

ARG user=lolprod
ARG uid=2100
RUN adduser -u $uid -D $user

WORKDIR /srv/loadorderlibrary.com

# Install system deps
RUN apk update && apk add \
    libzip-dev

# Clear cache
RUN apk cache clean && \
    rm -rf /var/lib/apk/lists/* && \
    rm -rf /var/cache/apk/*

# Install needed PHP extensions
RUN docker-php-ext-configure opcache --enable-opcache && \
	docker-php-ext-install pdo_mysql zip

# Set move OPCache config
COPY docker/prod/app/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

# Copy project to container
COPY . .
COPY --from=build-prod-node /app/public ./public
COPY --from=build-prod-composer /app/vendor ./vendor
COPY --from=build-prod-composer /app/bootstrap ./bootstrap

RUN chown -R $user:$user /srv/loadorderlibrary.com

USER $user