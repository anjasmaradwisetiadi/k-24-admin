<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Main Technology

Main technology using for this app: 
```
Laravel 8
Bootstrap 4.6
MySql

```
More another package you can look on file ```package.json``` and ```composer.json```

## To Run the Laravel
First, you must have an  ```.env``` file first. To get it, you can access the folder
```
/assets-suplemen
```

how to install laravel package run this command.
```
composer install
```
then for running laravel run this command.
```
php artisan serve
```

For instalation and running laravel you can follow documentation <a href="https://laravel.com/docs/8.x" target="_blank">Laravel 8</a> , or when you use ,<b> Windows</b> you can running application <a href="https://laragon.org/docs/" target="_blank">Laragon</a>. 
Another information you can running migration seeder on laravel, for example data. 

## Note Important Read
When you need get data that can be used in this application. There are two ways, namely <b> run migration </b> and <b> import database </b>

1. How to use <b> run migration </b> 

Run the migrate database command
```
php artisan migrate:fresh --seed
```
Then run the url command below to run the data repair script that was randomly generated from the previous command
Make sure you have logged in first using the user listed below path <b> ## User have been Access <b>
```
https://master-duel-ruler.site/run-script-user
```
2. How to use <b> import database </b> 
You can download examples of data used in the database by taking it to the folder
```
/assets-suplemen
```
Import the database that you usually use using the example database above

## User have been Access
User can use for testing and authenthic on App
```
1.
email: anjasmara@gmail.com
password: anjasmara
position: administator

2.
email: mylalovic@gmail.com
password: mylalovic
position: member

3. 
another user with any role, it have default password
password: memberdefault
```

It have fun use App, Thanks :smile:
