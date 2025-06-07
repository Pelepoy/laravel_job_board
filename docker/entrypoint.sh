#!/bin/bash

chmod -R 775 /var/www/storage
chown -R www-data:www-data /var/www/storage

if [ ! -f  "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f  ".env" ]; then
    echo "Creating .env file from .env.example"
    cp .env.example .env
else
    echo ".env file already exists, skipping creation"
fi

# Migrate database
php artisan migrate --force
php artisan db:seed --force

# Clear caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Rebuild caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

php-fpm