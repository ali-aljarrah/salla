
# About The Project

This is a Laravel based project using Filament package.

## Run The Project

- Create an .env file in the root diractory.
- Copy .env.example content and paste it in the created .env file.
- Change APP_NAME to your app name, for example "Salla"
- Change APP_URL to the app URL
- Change APP_LOCALE, APP_FALLBACK_LOCALE and APP_FAKER_LOCALE to "ar"
- Change DB_CONNECTION to mysql
- Uncomment and Change DB_DATABASE to the database name
- Uncomment and Change DB_USERNAME to the database username
- Uncomment and Change DB_PASSWORD to the database password
- Run this command to install packages: 
```
composer install
```
- Run this command to generate app key: 
```
php artisan key:generate
```
- Run this command to migrate the database: 
```
php artisan migrate
```
- Run this command to make admin user: 
```
php artisan make:filament-user
```
