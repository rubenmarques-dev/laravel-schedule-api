# laravel-schedule-api

## Project setup / run
```
docker-compose up -d
```

### Tips
```
The container entrypoint run:
	php artisan config:cache
	php artisan migrate:fresh --seed

This will update the application accordling to the .env file and reset/seed the database EVERYTIME the application start.
```

