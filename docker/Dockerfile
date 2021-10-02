FROM ubuntu:focal as base

# Create directory for app
RUN mkdir /var/www

# Set working directory
WORKDIR /var/www

# Add/change user for application. Needed for files sync
RUN groupmod -g 1000 www-data
RUN usermod -u 1000 www-data
#RUN groupadd -g 1000 www-data
#RUN useradd -u 1000 -ms /bin/bash -g www-data www-data

# Copy existing application directory & permissions
COPY --chown=www-data:www-data ./ /var/www

RUN mkdir /var/www/var
RUN touch /var/www/var/app.db
RUN chown -R www-data:www-data /var/www/var

# Update package repo
RUN apt-get update

FROM base AS php

# Install PHP and extensions
RUN apt-get install -y \
    apt-transport-https \
    ca-certificates \
    software-properties-common \
    curl \
    sqlite3 \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y \
    php8.0-fpm \
    php8.0-zip \
    php8.0-gd \
    php8.0-xml \
    php8.0-soap \
    php8.0-mbstring \
    php8.0-mysql \
    php8.0-mongodb \
    php8.0-bcmath \
    php8.0-sqlite3

# Copy php config files
COPY ./docker/php /etc/php

# Install composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

# Install php deps
RUN composer install
RUN php bin/console doctrine:migrations:migrate

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

VOLUME /var/www/var

# Change current user to www
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["/usr/sbin/php-fpm8.0","-c","/etc/php/8.0/fpm/php.ini","--nodaemonize","--fpm-config","/etc/php/8.0/fpm/php-fpm.conf"]