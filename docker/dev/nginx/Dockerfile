# Development build NPM
FROM node:20-alpine3.18 as build-dev-node

WORKDIR /app

RUN mkdir -p public/

COPY package*.json webpack.mix.js /app/
RUN npm ci

COPY . .
RUN npm run dev

##########################################################
# Dev Node
FROM nginx:1.25.1-alpine as nginx-dev

COPY --from=build-dev-node /app/public /srv/testing.loadorderlibrary.com/public
COPY ./docker/dev/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/dev/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf