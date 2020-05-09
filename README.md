<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Laravel Webservice Example/Boilerplate

* [Laravel 7.x](https://laravel.com/docs/7.x)
* [Sanctum](https://laravel.com/docs/7.x/sanctum)
* Magical Facades Pattern

## Usage

This is not a package - it's a full Laravel project that you should use as a starter boilerplate, and then add your own custom functionalities.

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- That's it: Test API's with Postman

## Useful snippets to check
 - `HasApiResponse` Trait
 - `render method` in Handler.php
 - `Facades keyword` in controllers (Used as proxies for calling non-static method static)
 - `Facades` folder

** Note: Every api should hold `Accept: Application/json` in header. **
