FROM php:8.2-apache

# MySQL extension enable
RUN docker-php-ext-install mysqli

# Project copy
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html