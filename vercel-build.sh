#!/bin/bash

echo "BUILD START: Running Composer, NPM, and Artisan commands..."

# CRITICAL STEP: Clear any stale configuration cache.
php artisan config:clear

# 1. Install PHP & Node Dependencies
composer install --no-dev --optimize-autoloader
npm install

# 2. Build Frontend Assets
npm run build

# 3. Cache Laravel Configs for Performance (This will now include the APP_KEY)
php artisan config:cache
php artisan route:cache

# 4. Run Database Migrations
php artisan migrate --force

echo "BUILD END: Script finished successfully."