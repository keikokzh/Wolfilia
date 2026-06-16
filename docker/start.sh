#!/usr/bin/env bash
set -e

: "${PORT:=8080}"

sed -i "s/Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:.*/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "Clearing Laravel cache..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

echo "Running database migrations..."
php artisan migrate --force

echo "Caching Laravel config..."
php artisan config:cache
php artisan route:cache || true
php artisan view:cache || true

echo "Starting Apache..."
apache2-foreground