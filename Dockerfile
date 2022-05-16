FROM php:8.0-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN apt-get update && \
    apt-get install -y apt-utils zip

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions xdebug yaml pdo_mysql intl

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
    mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html

COPY . .

RUN chown www-data:www-data -R /var/www/html/cache  && \
    chown www-data:www-data -R /var/www/html/public/uploads  && \
    chmod 775 -R /var/www/html/cache && \
    chmod 775 -R /var/www/html/public/uploads

RUN composer install

RUN a2enmod rewrite && service apache2 restart
