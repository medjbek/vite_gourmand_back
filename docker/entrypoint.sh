#!/bin/sh
set -e

cd /var/www

# Générer la clé Laravel si absente
if [ -f ".env" ]; then
  if ! grep -q "^APP_KEY=base64:" .env; then
    php artisan key:generate --force || true
  fi
fi

# Attente MySQL (max ~30s)
echo "Waiting for MySQL..."
for i in $(seq 1 15); do
  mysql -h db -u root -proot -e "SELECT 1" && break
  sleep 2
done
echo "MySQL OK"

# Migrations (local uniquement)
php artisan migrate --force || true

# Cache Laravel (perf locale)
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

exec php-fpm -F -R
