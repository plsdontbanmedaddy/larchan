#!/bin/bash

echo "BUILD START: Running Composer, NPM, and Artisan commands..."

# 1. Install PHP & Node Dependencies
composer install --no-dev --optimize-autoloader
npm install

# 2. Build Frontend Assets
npm run build

# 3. Cache Laravel Configs for Performance
php artisan config:cache
php artisan route:cache

# 4. Run Database Migrations
php artisan migrate --force

echo "BUILD END: Script finished successfully."