FROM php:8.2-cli
WORKDIR /app
RUN apt-get update && apt-get install -y libzip-dev unzip git libonig-dev && docker-php-ext-install zip pdo pdo_mysql mbstring
COPY . .
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN if [ ! -f .env ]; then cp .env.example .env; fi
EXPOSE 10000
CMD sh -c "php artisan key:generate --force || true; php artisan migrate --force || true; php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"
