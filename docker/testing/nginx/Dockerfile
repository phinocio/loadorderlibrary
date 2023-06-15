# Development build frontend
FROM node:20-alpine3.18 as build-testing-node

WORKDIR /app

RUN mkdir -p public/

COPY package*.json webpack.mix.js /app/
RUN npm ci

COPY . .
RUN npm run prod

##########################################################
# Testing nginx
FROM nginx:1.25.1-alpine as nginx-testing

COPY --from=build-testing-node /app/public /var/www/public
COPY ./docker/testing/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/testing/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf
