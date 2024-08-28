FROM nginx:stable-alpine

WORKDIR /etc/nginx/conf.d

COPY build/docker/nginx/nginx.conf .

RUN mv default.conf default.conf

WORKDIR /var/www/html

COPY src .
