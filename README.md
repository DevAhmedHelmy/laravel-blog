# laravel-blog
Laravel Blog 

### I have learned this laravel blog from this youtube playlist [https://www.youtube.com/playlist?list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx](https://www.youtube.com/playlist?list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx) by [J. Alexander Curtis](https://github.com/jacurtis)

## validation library used
- http://parsleyjs.org/

## Laravel Framework
- 5.4.2

#### 1st video
```php
    //installing laravel via composer
    composer create-project --prefer-dist laravel/laravel laravel-blog
    //or
    laravel new laravel-blog

    //change directory to the project
    cd laravel-blog

    //run the laravel-blog application via artisan
    php artisan serve

```
#### 4
```php
    //creating controller via artisan
    php artisan make:controller PagesController

```

#### 5^1/2

- bootstrap link
[http://getbootstrap.com/components](http://getbootstrap.com/components)

#### 8
```php
    //creating model with migration via artisan
    php artisan make:model Post --migration
    //or only migration
    php artisan make:migration create_posts_table
```
#### 9
```php
    //setting default string length in 'app/Providers/AppServicePorvider.php'
    //before we get errors
    use Illuminate\Support\Facades\Schema;
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    //migrate via artisan
    php artisan migrate
```
#### 10
```php
    //via artisan creating controller with CRUD
     php artisan make:controller PostController --resource

     //via artisan you can see all routes
     php artisan route:list

    +--------+-----------+-------------------+---------------+-------------------------------------------------+--------------+
    | Domain | Method    | URI               | Name          | Action                                          | Middleware   |
    +--------+-----------+-------------------+---------------+-------------------------------------------------+--------------+
    |        | GET|HEAD  | /                 |               | App\Http\Controllers\PagesController@getIndex   | web          |
    |        | GET|HEAD  | about             |               | App\Http\Controllers\PagesController@getAbout   | web          |
    |        | GET|HEAD  | api/user          |               | Closure                                         | api,auth:api |
    |        | GET|HEAD  | contact           |               | App\Http\Controllers\PagesController@getContact | web          |
    |        | GET|HEAD  | posts             | posts.index   | App\Http\Controllers\PostController@index       | web          |
    |        | POST      | posts             | posts.store   | App\Http\Controllers\PostController@store       | web          |
    |        | GET|HEAD  | posts/create      | posts.create  | App\Http\Controllers\PostController@create      | web          |
    |        | GET|HEAD  | posts/{post}      | posts.show    | App\Http\Controllers\PostController@show        | web          |
    |        | PUT|PATCH | posts/{post}      | posts.update  | App\Http\Controllers\PostController@update      | web          |
    |        | DELETE    | posts/{post}      | posts.destroy | App\Http\Controllers\PostController@destroy     | web          |
    |        | GET|HEAD  | posts/{post}/edit | posts.edit    | App\Http\Controllers\PostController@edit        | web          |
    +--------+-----------+-------------------+---------------+-------------------------------------------------+--------------+
```

#### 11
```php
    //go to laravel collective website
    https://laravelcollective.com/

    //Begin by installing this package through Composer. Edit your project's composer.json file to require laravelcollective/html.

    composer require "laravelcollective/html":"^5.4.0"

    //Next, add your new provider to the providers array of config/app.php:

    'providers' => [
        // ...
        Collective\Html\HtmlServiceProvider::class,
        // ...
    ],

    //Finally, add two class aliases to the aliases array of config/app.php:

    'aliases' => [
        // ...
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
        // ...
    ],
```
#### 22
```php
    //try to search in laravel documentation for dropping column (maybe online doc updated)

    //to update composer file
    composer self-update

    //add this in compaser.json then run via composer
    composer update

    //droping column in dev environment

    "require-dev": {
         "doctrine/dbal": "*"
    }

    //to update table from database run this via artisan
    //drop all then mirate again
    php artisan migrate:refresh

```
#### 27
```php
    //I've used latest code of laravel
```

#### 30
-   use this as email testing for reset password
-   https://mailtrap.io

#### 30.5
```php
    // for genarating controllers, views for authintication
    php artisan make:auth

    //then dont forget run maigration, to set tables in database
    php artisan migrate
```

#### 31
```php
    //creating model with migration via artisan with table name
    php artisan make:migration create_categories_table --create=categories
    //add column with existing table
    php artisan make:migration add_category_id_to_posts --table=posts
```
#### 32
```php
    // exclude one route
    Route::resource('categories','CategoryController',['except'=>['create']]);
```

#### 37
```php
    //multiple select js
    https://github.com/select2/select2

    //then just copy the files inside dist to public folder in current app
    dist/css/select2.min.css
    dist/js/select2.min.js
```

#### 41.5
- image src sample
- https://en.gravatar.com/site/implement/images/

#### 43
- doc editor
- https://www.tinymce.com/docs/get-started/basic-setup/

#### 45
- security
- https://github.com/mewebstudio/Purifier