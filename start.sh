#!/bin/bash

# Exit on any error
set -e

echo "Starting Laravel application..."

# Wait for any dependencies to be ready (if needed)
# sleep 5

# Ensure proper permissions
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache

# Ensure database exists and has proper permissions
touch /var/www/html/database/database.sqlite
chmod 664 /var/www/html/database/database.sqlite
chown www-data:www-data /var/www/html/database/database.sqlite

# Clear and cache configuration
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Run migrations
php artisan migrate --force

# Cache optimizations for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Laravel application is ready!"

# Start Apache
exec apache2-foreground 