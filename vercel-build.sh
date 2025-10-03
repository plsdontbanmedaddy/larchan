#!/bin/bash

echo "BUILD START"

# 1. Install PHP Dependencies
composer install --no-dev --optimize-autoloader

# 2. Install Node.js Dependencies
npm install

# 3. Build Frontend Assets
npm run build

# 4. Run Database Migrations
php artisan migrate --force

echo "BUILD END"