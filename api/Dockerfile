FROM php:8.0-apache

COPY . /var/www/html

# 必要に応じて追加のPHP拡張をインストール
RUN docker-php-ext-install mysqli pdo pdo_mysql