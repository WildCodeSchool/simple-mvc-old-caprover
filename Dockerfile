FROM php:7.4-fpm

# Set working directory
WORKDIR /var/www
# Copy Symfony application directories
COPY ./ /var/www/

# Install PHP dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libpq-dev \
    libonig-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libpng-dev \
    libwebp-dev \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    graphviz \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    git \
    curl \
    libcurl4 \
    libcurl4-openssl-dev \
    nginx


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# mcrypt
RUN pecl install mcrypt-1.0.3
RUN docker-php-ext-enable mcrypt
# Install extensions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install pdo_mysql 
RUN docker-php-ext-install mbstring 
RUN docker-php-ext-install zip 
RUN docker-php-ext-install exif 
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install -j$(nproc) intl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer.lock and composer.json
#COPY ./composer.lock ./composer.json /var/www/
RUN if [ ${APP_ENV} = "prod" ] ; then composer install --no-dev --no-interaction -o ; else composer install --no-interaction -o ; fi

RUN ls /var/www/

# Copy server configuration files
COPY ./nginx.conf /etc/nginx/conf.d/app.conf
RUN ls /etc/nginx/conf.d

COPY ./php.ini /usr/local/etc/php/conf.d/local.ini
RUN ls /usr/local/etc/php/conf.d
RUN cat /usr/local/etc/php/conf.d/local.ini

RUN rm -rf /etc/nginx/sites-enabled
RUN mkdir -p /etc/nginx/sites-enabled

# Expose port 80 and start php-fpm server
EXPOSE 80

COPY docker-entry.sh /
RUN chmod +x /docker-entry.sh
CMD ["/docker-entry.sh"]