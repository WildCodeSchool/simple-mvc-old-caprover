#!/bin/sh

php /var/www/migration.php

chmod -R 777 /var/www/public/uploads

## server config
php-fpm &
nginx -g "daemon off;"