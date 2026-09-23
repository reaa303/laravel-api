FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y libzip-dev unzip git libonig-dev libxml2-dev \
 && docker-php-ext-install zip pdo_mysql mbstring

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --no-scripts --no-interaction --optimize-autoloader \
 && if [ -f .env.example ] && [ ! -f .env ]; then cp .env.example .env; fi \
 && php artisan key:generate --force 2>&1 || true

EXPOSE 10000

CMD sh -c "php artisan config:clear; php artisan migrate --force 2>&1 || true; php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"
