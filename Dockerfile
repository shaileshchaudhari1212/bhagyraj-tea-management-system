FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    zip \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    nodejs \
    npm

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install zip gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install Node dependencies
RUN npm install

# Build Vite assets
RUN npm run build

RUN mkdir -p /app/database && touch /app/database/database.sqlite

EXPOSE 10000

CMD sh -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000"