#!/bin/sh
set -e

echo "==> Setting permissions..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

echo "==> Caching config, routes, views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Running migrations..."
php artisan migrate --force

echo "==> Linking storage..."
php artisan storage:link --force

echo "==> Starting PHP-FPM..."
php-fpm -D

echo "==> Starting Nginx..."
exec nginx -g 'daemon off;'
