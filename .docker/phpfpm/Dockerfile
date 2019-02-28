FROM php:7.2-fpm

ARG HOST_UID=1000
ARG WEB_USER=www-data
ARG WEB_GROUP=www-data
ARG PHP_ROOT_DIR=/usr/local/etc/

# Copy PHP/Files Configurations into containers:
COPY ./config/php.ini ${PHP_ROOT_DIR}/php/
# COPY ./config/zz-custom-xdebug.ini ${PHP_ROOT_DIR}/php/conf.d/zz-custom-xdebug.ini
COPY ./config/zz-www.conf ${PHP_ROOT_DIR}/php-fpm.d/zz-www.conf

# Final permissions adjustments:
RUN usermod -u ${HOST_UID} ${WEB_GROUP}

RUN chown -R ${WEB_USER}:${WEB_GROUP} /var/www \
        && chmod g+s /var/www/html

USER ${HOST_UID}