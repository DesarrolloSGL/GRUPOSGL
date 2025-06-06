# --- Etapa de Builder (Esta etapa no cambia) ---
FROM php:8.2-cli as builder
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

# --- Etapa Final de Producción (Grandes cambios aquí) ---
# Usamos la imagen oficial de PHP 8.2 FPM, basada en Debian
FROM php:8.2-fpm

# Instalamos Nginx, Supervisor y dependencias de PHP
RUN apt-get update && apt-get install -y nginx supervisor libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Creamos el directorio de trabajo
WORKDIR /var/www/html

# Copiamos los archivos de la aplicación y las dependencias
COPY . .
COPY --from=builder /app/vendor/ ./vendor

# Copiamos los archivos de configuración que creamos
COPY nginx.conf /etc/nginx/sites-available/default
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Asignamos permisos al usuario www-data (usuario de PHP-FPM y Nginx en esta imagen)
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponemos el puerto
EXPOSE 80

# Comando final para iniciar el supervisor, que a su vez inicia Nginx y PHP-FPM
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
