FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
    build-essential mysql-client openssh-client libmcrypt-dev libpng-dev tzdata zip wget \
    && cp -R /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime \
    && echo "America/Sao_Paulo" > /etc/timezone \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN chmod +x /usr/bin/composer

RUN docker-php-ext-install pdo_mysql tokenizer

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get install nano supervisor git zip -y

RUN apt-get install -y nginx  && \
    rm -rf /var/lib/apt/lists/*

RUN rm /etc/nginx/sites-enabled/default

COPY deploy.conf /etc/nginx/conf.d/default.conf

# RUN mv /usr/local/etc/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf.backup
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

COPY run /app/run
WORKDIR /var/www/html

RUN usermod -a -G www-data root

RUN chmod +x /app/run

ENTRYPOINT ["/app/run"]

EXPOSE 80
