#!/bin/sh
set -e

PORT="${PORT:-8080}"

if [ -n "${MYSQL_ATTR_SSL_CA:-}" ] && [ ! -f "${MYSQL_ATTR_SSL_CA}" ]; then
    echo "MYSQL_ATTR_SSL_CA file not found inside container; unsetting it for this runtime." >&2
    unset MYSQL_ATTR_SSL_CA
fi

sed -i "s/^Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:[0-9][0-9]*/<VirtualHost *:${PORT}/" /etc/apache2/sites-available/000-default.conf

mkdir -p \
    bootstrap/cache \
    public/content \
    public/profile \
    storage/app/public \
    storage/framework/cache \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs

chown -R www-data:www-data bootstrap/cache public/content public/profile storage

php artisan config:clear --no-interaction
php artisan route:clear --no-interaction
php artisan view:clear --no-interaction

exec apache2-foreground
