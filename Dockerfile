# --- Etapa de Builder ---
FROM composer:2 as builder
WORKDIR /app
COPY database/ database/
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist --no-dev --optimize-autoloader

# --- Etapa Final de Producción ---
FROM richarvey/nginx-php-fpm:2.0.1
WORKDIR /var/www/html
COPY --from=builder /app/vendor/ /var/www/html/vendor/
COPY . .

# ----- LÍNEA NUEVA Y CRÍTICA -----
# Aquí le decimos a Nginx que la carpeta raíz del sitio es /public
ENV WEBROOT /var/www/html/public
# ---------------------------------

# Asignamos los permisos correctos
RUN chown -R nginx:nginx /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponemos el puerto 80
EXPOSE 80
