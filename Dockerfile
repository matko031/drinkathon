FROM php:7.4-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN a2enmod rewrite
COPY .htaccess /var/www/html/.htaccess
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www #this line after COPY
RUN sed -i 's/AllowOverride None/AllowOverride All/i' /etc/apache2/apache2.conf
