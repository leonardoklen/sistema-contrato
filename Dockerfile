FROM php:8.2.0-fpm as prod

RUN usermod -u 1000 -s /bin/bash www-data && groupmod -g 1000 www-data

RUN apt-get update && apt-get install -y \
    libpq-dev \
    nginx \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_pgsql 

#Nginx configure default application
RUN rm /etc/nginx/sites-available/default
RUN rm /etc/nginx/sites-enabled/default
ADD .docker/nginx/sites-available/default /etc/nginx/sites-available/default.conf
ADD .docker/nginx/sites-available/default /etc/nginx/sites-enabled/default.conf

#PHP Configuration
ADD .docker/php/php.ini /usr/local/etc/php/php.ini

ADD .docker/php/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN rm -Rf /var/www/* && \
mkdir /var/www/html/

#Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Add application source to container
ADD . /var/www/html/

RUN chown -R 1000:1000 /var/www/html
WORKDIR "/var/www/html"
RUN composer install --ignore-platform-reqs

EXPOSE 80

ADD .docker/entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /usr/local/bin/*

CMD ["nginx", "-g", "daemon off;"]

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

FROM prod AS dev

RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN echo "xdebug.mode = debug" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" \
&& echo "xdebug.start_with_request = yes" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" \
&& echo "xdebug.client_host = host.docker.internal" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" \
&& echo "xdebug.client_port = 9000" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" \
&& echo "xdebug.cli_color = 2" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" \
&& echo "xdebug.dump.* = *" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" \
&& echo "xdebug.dump_globals = true" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" \
&& echo "xdebug.force_display_errors = 1" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" \
&& echo "xdebug.log = /var/www/html/log/xdebug.log" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" \
&& echo "xdebug.log_level = 7" >> "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini"
