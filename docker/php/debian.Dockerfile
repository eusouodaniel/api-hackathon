FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
    build-essential mysql-client openssh-client libmcrypt-dev libpng-dev tzdata nodejs zip wget sqlite3 libcurl4-openssl-dev pkg-config libssl-dev \
    && cp -R /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime \
    && echo "America/Sao_Paulo" > /etc/timezone \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN chmod +x /usr/bin/composer
RUN wget https://phar.phpunit.de/phpunit-7.phar \
    && chmod +x phpunit-7.phar \
    && mv phpunit-7.phar /usr/local/bin/phpunit
RUN docker-php-ext-install pdo_mysql tokenizer

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    zlib1g-dev \
    && docker-php-ext-install -j$(nproc) iconv zip bcmath \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && pecl install mongodb \
    && echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/ext-mongodb.ini

COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

WORKDIR /srv

EXPOSE 3000
EXPOSE 6001

RUN composer global require hirak/prestissimo

RUN echo "alias art='php artisan'" >> ~/.bashrc
RUN echo "alias cache='php artisan cache:clear && php artisan config:clear &&  \
                        php artisan route:clear && php artisan view:clear'" >> ~/.bashrc

RUN echo "alias cc='composer clear-cache'" >> ~/.bashrc
RUN echo "alias cu='composer update'" >> ~/.bashrc
RUN echo "alias ci='composer install'" >> ~/.bashrc
RUN echo "alias cdo='composer dump-autoload'" >> ~/.bashrc