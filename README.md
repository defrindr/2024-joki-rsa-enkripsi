# Instalasi

1. Download Zip Code
2. Install composer
```
composer install
php artisan migrate:fresh
php artisan db:seed --class=UserSeeder
php artisan serve
```