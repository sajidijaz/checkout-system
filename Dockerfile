# Use the official PHP 8.1 image as the base image
FROM php:8.1-cli

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    && apt-get clean

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /var/www/html

# Set environment variable to allow Composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install project dependencies
RUN composer install

# Run PHPUnit tests
CMD ["./vendor/bin/phpunit"]

