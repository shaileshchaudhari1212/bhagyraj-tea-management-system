FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    zip \
    nodejs \
    npm

RUN docker-php-ext-install zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --optimize-autoloader --no-dev

RUN npm install
RUN npm run build

RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan view:clear

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000