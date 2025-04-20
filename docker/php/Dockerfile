FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    libonig-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    curl \
    libpq-dev \
    postgresql-client

# Clear the apt cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure GD extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create a user and group for www
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt-get update && apt-get install -y symfony-cli

# Set the working directory
WORKDIR /var/www

# Copy the composer files
COPY --chown=www:www ./composer.lock* ./composer.json* /var/www/

# Copy the rest of the application code
COPY --chown=www:www ../../ /var/www/

# Switch to the www user
USER www

# Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
