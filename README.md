
## setup
1. composer install
2. cp .env.example .env
3. php artisan key:generate

## run get city, district, ward
# city
+ php artisan cron:city

# district
+ php artisan cron:district

#ward
+ php artisan cron:ward
