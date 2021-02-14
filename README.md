# laravel-schedule-api

## Project setup / run
```
docker-compose up -d
```

### Tips
```
The container entrypoint run:
	php artisan config:cache
    php artisan wait_database_alive && php artisan migrate --seed

This will update the application accordling to the .env file 
```

