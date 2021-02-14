#!/bin/sh

if [ -f ./composer.json ]; then
	if [ ! -d "./vendor" ]; then
	  composer install
	fi

	service supervisor start
	service cron start
	php artisan config:cache

	php artisan serve --host=0.0.0.0 --port=8000

else
#	laravel new project
tail -f /dev/null
fi
