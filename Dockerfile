FROM php:8.3-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

RUN npm install
RUN npm run build

RUN mkdir -p storage/framework/views
RUN mkdir -p storage/framework/cache
RUN mkdir -p storage/framework/sessions
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT