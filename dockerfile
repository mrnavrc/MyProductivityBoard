FROM php:8.1-cli
WORKDIR /MyProductivityBoard
RUN apt-get update
RUN docker-php-ext-install pdo pdo_mysql

