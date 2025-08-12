# Dockerfile para Render (un solo contenedor)
FROM php:8.1-cli

# Extensiones necesarias
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libonig-dev libxml2-dev \
 && docker-php-ext-install pdo pdo_mysql zip \
 && pecl install redis \
 && docker-php-ext-enable redis \
 && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copiamos composer.* primero para usar caché
COPY composer.json composer.lock* ./
RUN composer install --no-interaction --prefer-dist --no-progress --no-scripts

# Copiamos el código
COPY . .

# Permisos para Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# Render te inyecta PORT en tiempo de ejecución
ENV PORT=10000
EXPOSE 10000

# Importante: escuchar en 0.0.0.0:$PORT
# Opcional: cachear config/rutas si compila
CMD sh -lc "php artisan config:cache || true; php artisan route:cache || true; php -S 0.0.0.0:${PORT} -t public"
