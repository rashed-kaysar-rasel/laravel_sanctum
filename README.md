### API Boilerplate with Laravel Sanctum


## Getting Started

First clone the project and change the directory

```shell
git clone https://github.com/Rasel15827/laravel_sanctum.git
```

Then follow the process

### Setup the project

1. install the dependencies

```shell
composer install
```

2. Copy `.env.example` to `.env`

```shell
cp .env.example .env
```

3. Generate application key

```shell
php artisan key:generate
```

4. Start the webserver

```shell
php artisan serve
```

That's mostly it! You have a fully running laravel installation with Sanctum, all configured.



## Database Migration and Seeding

You can start with Mysql by following these steps

1. Create a new Mysql database

2. Open your `.env` file and change the DATABASE options.

3. Open `config\database.php` and change the mysql options.

4. You can run both migrations and seeders together by simply running the following command

```shell
php artisan migrate:fresh --seed
```

**OR** 


you can run them separately using the following commands

2. Run Migrations

```shell
php artisan migrate:fresh
```

Now your database has essential tables for user, roles management and category.

3. Run Database Seeders

Run `db:seed`, and you have your first admin user, reguler user, some category, some essential roles in the roles table, and the relationship correctly setup.

```shell
php artisan db:seed
```


