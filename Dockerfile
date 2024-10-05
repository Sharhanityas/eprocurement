FROM php:8.1-fpm

# Update package index
RUN apt-get update 

# Install system dependencies
RUN apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip

# Configure and install GD extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy application code
COPY . .

# Install Composer dependencies
RUN composer install --ignore-platform-reqs

# Expose the port your app runs on
EXPOSE 9000
