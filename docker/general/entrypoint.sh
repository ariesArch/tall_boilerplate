#!/bin/bash
# npm install
# npm run build
php artisan migrate
php artisan optimize:clear
php artisan view:cache