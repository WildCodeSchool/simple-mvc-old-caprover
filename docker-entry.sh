#!/bin/sh

php /var/www/migration.sql

chmod -R 777 /var/www/public

## server config
php-fpm &
nginx -g "daemon off;"