SETUP LARAVEL PROJECT

1. Install Composer Dependencies
Run: 
composer install

2. Setup .env

 - Duplicate the .env.example file and rename it to .env
 - Open the .env file and set your database connection details

 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=laravel
 DB_USERNAME=sail
 DB_PASSWORD=password 


3. Setup MySql Container
Run:

./vendor/bin/sail up -d

4. Migrate the Database

Run:
php artisan migrate

5. Seed the Database

Run:
php artisan db:seed

6. Start the Development Server
php artisan serve



