#!/bin/sh

if [ -f ./composer.json ]; then
	if [ ! -d "./vendor" ]; then
	  composer install
	fi

	php artisan config:cache
    php artisan wait_database_alive && php artisan migrate --seed
    php artisan serve --host=0.0.0.0 --port=8000

else
#	laravel new project
tail -f /dev/null
fi
