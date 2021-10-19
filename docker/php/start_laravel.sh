#!/bin/bash

echo "Role: ${LARAVEL_ROLE}"

if [ $LARAVEL_ROLE == "fpm" ]; then
    echo "Launching as an FPM container"
    php-fpm
elif [ $LARAVEL_ROLE == "queue" ]; then
    /usr/bin/supervisord -n -c /etc/supervisor/horizon.conf
elif [ $LARAVEL_ROLE == "cron" ]; then
    /usr/bin/supervisord -n -c /etc/supervisor/cron.conf
elif [ $LARAVEL_ROLE == "websocket" ]; then
    /usr/bin/supervisord -n -c /etc/supervisor/websocket.conf
fi


