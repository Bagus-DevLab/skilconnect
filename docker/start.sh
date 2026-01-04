#!/bin/sh

# Generate app key if not exists
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Run migrations
php artisan migrate --force

# Cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM in background
php-fpm -D

# Start Nginx in foreground
nginx -g 'daemon off;'
```

### 5. **ATAU Solusi Simpel dengan Artisan Serve**

Jika tidak mau ribet dengan Nginx, gunakan built-in server Laravel.

Buat `Procfile` di root:
```
web: php artisan serve --host=0.0.0.0 --port=${PORT:-8080}