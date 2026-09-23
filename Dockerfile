FROM php:8.4-cli
WORKDIR /app
RUN apt-get update && apt-get install -y libzip-dev unzip git libonig-dev libxml2-dev libpq-dev libsqlite3-dev && docker-php-ext-install zip pdo_mysql pdo_pgsql pdo_sqlite mbstring bcmath
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts
COPY . .
RUN composer dump-autoload --optimize
EXPOSE 10000
CMD sh -c "mkdir -p /tmp && touch /tmp/database.sqlite && php artisan config:clear; php artisan migrate --force || true; php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"
