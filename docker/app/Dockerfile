# Dockerfile para Render (un solo contenedor)
FROM php:8.1-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libxml2-dev \
 && docker-php-ext-install pdo pdo_mysql zip \
 && pecl install redis \
 && docker-php-ext-enable redis \
 && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Instala deps con caché
COPY composer.json composer.lock* ./
RUN composer install --no-interaction --prefer-dist --no-progress --no-scripts

# Copia el código
COPY . .

# 🔒 Asegúrate de NO llevarte el .env local
RUN rm -f .env

# Permisos
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

ENV PORT=10000
EXPOSE 10000

# Limpia cachés antes de recachear con las ENV de Render
CMD sh -lc "php artisan config:clear && php artisan cache:clear && php artisan route:clear && php artisan config:cache || true; php artisan route:cache || true; php -S 0.0.0.0:${PORT} -t public"
