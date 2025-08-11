# Imagen base PHP-FPM
FROM php:8.1-fpm

# Extensiones del sistema
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libonig-dev libxml2-dev vim \
    && docker-php-ext-install pdo pdo_mysql zip

# Opcional: Redis PHP extension
RUN pecl install redis \
    && docker-php-ext-enable redis

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copiamos composer.* primero para aprovechar caché
COPY composer.json composer.lock* ./

# Instalar dependencias PHP (sin dev en prod; aquí dejamos ambas por simplicidad)
RUN composer install --no-interaction --prefer-dist --no-scripts --no-progress

# Copiar el proyecto
COPY . .

# Permisos para storage y cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Usuario de ejecución
USER www-data

# Exponer puerto PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
