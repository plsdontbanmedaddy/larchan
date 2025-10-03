#!/bin/bash

# 1. Run Composer Install
composer install --no-dev --optimize-autoloader

# 2. Run Vite Build
npm run build

# 3. Run Migrations
php artisan migrate --force