## Hesh

`Hesh` provides a minimal and simple starting point for building a Laravel application with authentication and a customizable admin dashboard. Styled with Bootstrap, `Hesh` publishes authentication controllers and views to your application that can be easily customized with your own design, template engine and functionalities based on your own application's needs.

<p align="center">
    <a href="https://packagist.org/packages/remonhasan/hesh">
        <img src="https://img.shields.io/packagist/dt/remonhasan/hesh" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/remonhasan/hesh">
        <img src="https://img.shields.io/packagist/v/remonhasan/hesh" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/remonhasan/hesh">
        <img src="https://img.shields.io/packagist/l/remonhasan/hesh" alt="License">
    </a>
</p>

## Requirements

- PHP >=8.0.2


## Installation

To install the most recent version, run the following command.

```php
  composer require remonhasan/hesh
```
Go to composer.json

```php
   "minimum-stability": "dev",
```

Go to app.php in config directory

```php
  'providers' => [
      Remonhasan\Hesh\HeshServiceProvider::class,
  ],
```

Go to auth.php in config directory

```php
  use Remonhasan\Hesh\Models\Admin;

  'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

     'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => Admin::class,
        ],
    ],
```

Go to Kernel.php

```php
  use Remonhasan\Hesh\Middleware\Admin;

   protected $routeMiddleware = [
        'admin' => Admin::class,
    ];
```

Run the migrations

```php
  php artisan migrate
```

Start the server by running `php artisan serve` and acces route for registration, login and redirect to dashboard.

```php
  http://localhost:8000/admin-register
  http://localhost:8000/admin-login
```
