#!/bin/bash
set -e

# ============================================================
# Memento Trips — Deploy Script for Ploi.io
# ============================================================
#
# PREREQUISITES:
#   - Server provisioned with PHP 8.2+, MySQL 8, Node.js, Composer
#   - Database created via Ploi panel (e.g. memento_trips)
#   - DB credentials set in .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
#   - reaktive_travel.sql present in project root
#
# FIRST DEPLOY:
#   Use this script as-is. It will import the SQL dump and
#   run any pending migrations automatically.
#
# SUBSEQUENT DEPLOYS:
#   Comment out or remove the "Import SQL dump" section below.
#   Only migrations will run for new schema changes.
#
# ============================================================

echo "🚀 Starting deployment..."

git pull origin main

# PHP dependencies (production only)
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Frontend assets
npm ci
npm run build

# Laravel setup
php artisan storage:link 2>/dev/null || true
chmod -R 775 storage bootstrap/cache

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# ---- Import SQL dump (FIRST DEPLOY ONLY - remove after first use) ----
sed -e '/^SET @@/d' -e 's/DEFINER[ ]*=[ ]*`[^`]*`@`[^`]*`//g' reaktive_travel.sql > /tmp/clean_dump.sql
php artisan tinker --execute="DB::connection()->getPdo()->exec(file_get_contents('/tmp/clean_dump.sql'));echo 'Imported';" --no-interaction
rm /tmp/clean_dump.sql
# ---- End import section ----

# Run pending migrations
php artisan migrate --force

# Rebuild caches
php artisan config:cache
php artisan view:cache
php artisan route:cache

echo "✅ Deploy complete!"
