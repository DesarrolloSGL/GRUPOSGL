# --- Etapa de Builder ---
# CAMBIO: Usamos una imagen oficial con PHP 8.2 y le instalamos Composer
FROM php:8.2-cli as builder

# Instalamos dependencias del sistema y Composer
RUN apt-get update && apt-get install -y unzip libzip-dev && \
    EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')" && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")" && \
    if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]; then >&2 echo 'ERROR: Invalid installer checksum'; exit 1; fi && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

WORKDIR /app
COPY database/ database/
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist --no-dev --optimize-autoloader


# --- Etapa Final de Producción ---
# CAMBIO: Usamos la imagen de Nginx/PHP-FPM que está etiquetada específicamente para PHP 8.2
FROM richarvey/nginx-php-fpm:php82

WORKDIR /var/www/html
COPY --from=builder /app/vendor/ /var/www/html/vendor/
COPY . .

# Le decimos a Nginx que la carpeta raíz del sitio es /public
ENV WEBROOT /var/www/html/public

# Asignamos los permisos correctos
RUN chown -R nginx:nginx /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponemos el puerto 80
EXPOSE 80
