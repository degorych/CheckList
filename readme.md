# Laravel form application

## Recommended requirements for running the application

 - **PHP** Version 7 [Download here.](http://php.net/downloads.php)
 - **Apache** Version 2.4 [Download here.](https://httpd.apache.org/download.cgi)
 - **MySQL** Version 5.6 [Download here.](https://dev.mysql.com/downloads/)
 - **Composer** [Download here.](https://getcomposer.org/)
 
## To start the application you need
 
- Copy project from github.
- Create database.
- Go to `.env.example`, end delete **.example** extension or copy data to **.env** file (for example ` copy .env.example .env`). Enter into **.env** your data to db connect.
- Go to `config/database.php` and choose default settings for db connect, if need.
- Run **terminal** into app folder and enter **composer install** or **php composer.phar install** command.
- Run **php artisan key:generate**.
- Run **php artisan migrate** then **php artisan db:seed** or you can use one command **php artisan migrate --seed**.
- Run **php artisan serve**.

## User description

In this application new register users have not admin role, but if you want use admin functional you must login with **admin@mail.com** email and **123456** password. If you want add new admin or change email/password go to `database/seeds/UserSeeder.php` and add/change data. Do not forget to run `php artisan migrate:refresh --seed` if you change seeder.

#### You can now access your project at localhost:8000 :)