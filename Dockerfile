FROM php:7.2.13-apache
RUN apt-get update
RUN apt-get install -y libxslt-dev vim locate unzip libaio1 libpq-dev libjpeg-dev libpng-dev libfreetype6-dev git
RUN docker-php-ext-install xsl mysqli pdo_mysql gd

RUN docker-php-ext-configure gd \
            --with-gd \
            --with-freetype-dir=/usr/include/ \
            --with-png-dir=/usr/include/ \
            --with-jpeg-dir=/usr/include/

RUN a2enmod rewrite
RUN a2enmod ssl

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN echo 'umask 002' >> /root/.bashrc
RUN echo "alias ll='ls -al'" >> /root/.bashrc
RUN echo "alias cc='clear'" >> /root/.bashrc
RUN echo "alias art='php artisan'" >> /root/.bashrc

RUN chown -R $USER:www-data storage \
    && chmod -R 775 storage

RUN service apache2 start
EXPOSE 80 443
