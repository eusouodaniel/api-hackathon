FROM php:7.2-fpm-alpine

RUN apk --update add git vim mysql-client nodejs openssh openssl libmcrypt-dev libpng-dev tzdata \
    && cp -R /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime \
    && echo "America/Sao_Paulo" > /etc/timezone \
    && npm i -g uglify-js uglifycss \
    && ln -s /usr/lib/node_modules/uglify-js/bin/uglifyjs /usr/local/bin/ \
    && ln -s /usr/lib/node_modules/uglifycss/uglifycss /usr/local/bin/ \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN chmod +x /usr/bin/composer
RUN docker-php-ext-install pdo_mysql mcrypt bcmath tokenizer
RUN apk --update add freetype-dev libpng-dev libjpeg-turbo-dev libxml2-dev autoconf g++ imagemagick-dev libtool make \
    && docker-php-ext-install gd \
    && docker-php-ext-configure gd \
    --with-gd \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && apk del autoconf g++ libtool make \
    && rm -rf /tmp/* /var/cache/apk/*