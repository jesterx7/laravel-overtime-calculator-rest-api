<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to Install

- Open cmd and go to your desired folder path
- Run git clone https://github.com/jesterx7/laravel-overtime-calculator-rest-api.git
- Run cd laravel-overtime-calculator-rest-api
- Run composer install
- Rename .env.example to .env
- Create database and name it 'kledo' and create one more with 'kledo_testing' for test database.
- Open your .env file and change the database name (DB_DATABASE) to 'kledo' then change username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration
- Run php artisan migrate
- Run php artisan db:seed
- Run php artisan serve 

## Store Employee API

- Open Postman
- Change method to POST and enter url http://127.0.0.1:8000/api/employees
- Put Parameter on Body > form-data > name (string, ex: jackie) and salary (number, ex: 3000000)
- Click send to store new Employee

## Store Overtimes API

- Open Postman
- Make sure have 1 data employee minimum
- Change method to POST and enter url http://127.0.0.1:8000/api/overtimes
- Put Parameter on Body > form-data > employee_id (foreign of employee, ex: 1), date (date format 'Y-m-d', ex: 2022-09-03), time_started (time format 'H:i:s', ex: 19:00:00), time_ended (time format 'H:i:s', ex: 21:00:00)
- Click send to store new Overtimes

## Update / Patch Settings API

- Open Postman
- Change method to POST and enter url http://127.0.0.1:8000/api/settings?_method=PATCH
- Put Parameter on Body > form-data > key (specific string, ex: overtime_method) and value (foreign references id, ex: 2)
- Click send to update settings

## GET Overtimes Pays Calculation

- Open Postman
- Change method to POST and enter url http://127.0.0.1:8000/api/overtime-pays/calculate?_method=GET
- Put Parameter on Body > form-data > month (date format 'Y-m', ex: 2022-09)
- Click get overtimes pays calculation

## How to Run Test

- Run php artisan test

## Open Swagger

- Open  http://127.0.0.1:8000/api/documentation (Not Done)
