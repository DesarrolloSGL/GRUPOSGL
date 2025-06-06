# --- Etapa de Builder ---
# Usamos una imagen de PHP con Composer para instalar dependencias
FROM composer:2 as builder

# Establecemos el directorio de trabajo
WORKDIR /app

# Copiamos solo los archivos de dependencias para aprovechar el cache de Docker
COPY database/ database/
COPY composer.json composer.lock ./

# Instalamos las dependencias de producción
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist --no-dev --optimize-autoloader


# --- Etapa Final de Producción ---
# Usamos una imagen ligera de PHP-FPM con Nginx
FROM richarvey/nginx-php-fpm:2.0.1

# Establecemos el directorio de trabajo
WORKDIR /var/www/html

# Copiamos las dependencias instaladas desde la etapa de builder
COPY --from=builder /app/vendor/ /var/www/html/vendor/

# Copiamos todo el código de nuestra aplicación
COPY . .

# Asignamos los permisos correctos
# El usuario en esta imagen es 'nginx'
RUN chown -R nginx:nginx /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponemos el puerto 80
EXPOSE 80