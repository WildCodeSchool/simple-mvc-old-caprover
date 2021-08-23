#!/usr/bin/env sh
set -e

php /var/www/migration.php


php-fpm -D
nginx -g 'daemon off;'
