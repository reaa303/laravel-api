FROM php:8.4-cli
WORKDIR /app
RUN apt-get update && apt-get install -y libzip-dev unzip git libonig-dev libxml2-dev libpq-dev && docker-php-ext-install zip pdo_mysql pdo_pgsql mbstring bcmath
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction
EXPOSE 10000
CMD sh -c "php artisan config:clear; php artisan migrate --force || true; php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"
