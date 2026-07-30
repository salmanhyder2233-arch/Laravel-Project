FROM php:8.3-cli

# Install system packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies and build assets
RUN npm install
RUN npm run build

# Generate Laravel caches
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000