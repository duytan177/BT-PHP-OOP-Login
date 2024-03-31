FROM php:8.2-fpm-alpine

# Cài đặt PostgreSQL client và các thư viện cần thiết
RUN apk update && apk add postgresql-dev

# Cài đặt và kích hoạt mô-đun PDO PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql