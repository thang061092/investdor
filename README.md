
## setup
1. composer install
2. cp .env.example .env
3. php artisan key:generate.

## create DB
+ php artisan migrate

## city
+ php artisan cron:city
## district
+ php artisan cron:district
## ward
+ php artisan cron:ward
## bank
+ php artisan cron:bank
