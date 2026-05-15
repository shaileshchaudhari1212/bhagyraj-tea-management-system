FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install zip gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 10000

CMD sh -c "touch /app/database/database.sqlite && php artisan config:clear && php artisan cache:clear && php artisan migrate:fresh --force && php artisan serve --host=0.0.0.0 --port=10000"