# Production build frontend
FROM node:20-alpine3.18 as build-prod-node

WORKDIR /app

RUN mkdir -p public/

COPY package*.json webpack.mix.js /app/
RUN npm ci

COPY . .
RUN npm run prod

##########################################################
# Production nginx
FROM nginx:1.25.1-alpine as nginx-prod

COPY --from=build-prod-node /app/public /srv/loadorderlibrary.com/public
COPY ./docker/prod/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/prod/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf
