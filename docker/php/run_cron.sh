#!/bin/bash
if [ $LARAVEL_ROLE == "fpm" ]; then
    php /var/www/artisan schedule:run >> /dev/null 2>&1
fi


