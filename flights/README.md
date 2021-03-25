# Laravel Setup

## 1) Download Composer
Download [composer](https://getcomposer.org/)

## 2) Download PostgreSQL
Download [pgsql](https://www.postgresql.org/download/) and setup a db (named _flights_ on .env.example)

## 3) Download Repository
Download the [repository](https://github.com/bara96/SPAS-project)

**Important:** Laravel project is under the folder '_flights_', switch to that folder

## 4) Setup Environment
- On CLI, switch to the '_flights_' folder
- Copy the file <code> .env.example </code> and rename it to <code> .env </code>
- Edit the file <code> .env </code> with your db configurations
- Run the command <code> composer update </code> to update dependencies

## 5) Start Laravel
- Run the command <code> php artisan serve </code>
- Run the command <code> php artisan key:generate </code> to generate an Application key
- Run the command <code> php artisan migrate </code> to migrate the database
- Browse to  http://127.0.0.1:8000/

## 6) Import Data
To import the flights.csv run the command <code> php artisan import:flights </code>
