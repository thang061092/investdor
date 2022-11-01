
## setup
1. composer install
2. cp .env.example .env
3. php artisan key:generate.

## create DB
4. php artisan migrate

## city
5. php artisan cron:city
## district
6. php artisan cron:district
## ward
7. php artisan cron:ward
## bank
8. php artisan cron:bank
##upload
9. php artisan storage:link
