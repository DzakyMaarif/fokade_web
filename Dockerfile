# Stage 1: build dependencies
FROM php:8.1-fpm AS builder

# Install system deps
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo_mysql zip mbstring gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Stage 2: final image
FROM php:8.1-fpm

RUN apt-get update && apt-get install -y libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo_mysql zip mbstring gd

WORKDIR /app
COPY --from=builder /app/vendor ./vendor
COPY . .

# Set permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
