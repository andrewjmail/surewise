Install all the dependencies using composer

    composer install

Create the .env file and add your db settings

    cp .env.example .env

Create database
    
    Login to database and create database with the same name that you added to your env

Generate a new application key

    php artisan key:generate

Run the database migrations

    php artisan migrate --seed

Start the local development server

    php artisan serve

Navigation can be edited at /admin/navigations
