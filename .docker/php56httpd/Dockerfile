FROM php:5.6-apache-jessie

ARG HOST_UID
ARG WEB_USER=apache
ARG WEB_GROUP=apache
ARG XDEBUG_REMOTE_PORT=9100

# Required libs:
RUN apt-get update -y \
    && apt-get install -y \
        libxml2-dev \
        libmcrypt-dev \
        libc-client-dev \
        libkrb5-dev \
        libjpeg-dev \
        libpng12-dev \
        libfreetype6-dev \
        ldap-utils \
        libldap2-dev \
        libwww-perl \
        ImageMagick \
    && rm -r /var/lib/apt/lists/* \
    && apt-get clean -y

# PHP modules:
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

# Install modules/extensions:
RUN docker-php-ext-install gd \
        xmlrpc 

# Debuger
RUN yes | pecl install xdebug-2.5.5 \
    && docker-php-ext-enable xdebug

# Apache user
RUN usermod -u ${HOST_UID} ${WEB_USER} \
    && groupmod -g ${HOST_UID} ${WEB_GROUP}

COPY ./config/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./config/php.ini /usr/local/etc/php/
COPY ./config/zz-custom-xdebug.ini /usr/local/etc/php/conf.d/zz-custom-xdebug.ini

EXPOSE ${XDEBUG_REMOTE_PORT}
