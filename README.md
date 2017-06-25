# laravel-blog
Laravel Blog

### I have learned this laravel blog from this youtube playlist [https://www.youtube.com/playlist?list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx](https://www.youtube.com/playlist?list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx)


#### 1st video
```
    //installing laravel via composer
    composer create-project --prefer-dist laravel/laravel laravel-blog
    //or
    laravel new laravel-blog

    //change directory to the project
    cd laravel-blog

    //run the laravel-blog application via artisan
    php artisan serve

```
#### 4rth video
```
    //creating controller via artisan
    php artisan make:controller PagesController

```

#### 5^1/2th video

- bootstrap link
[http://getbootstrap.com/components](http://getbootstrap.com/components)

#### 8th video
```
    //creating model with migration via artisan
    php artisan make:model Post --migration
    //or only migration
    php artisan make:migration create_posts_table
```
#### 9th video
```php
    //setting default string length in 'app/Providers/AppServicePorvider.php'
    //before we get errors
    use Illuminate\Support\Facades\Schema;
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
```
```
    //migrate via artisan
    php artisan migrate
```
#### 10th video
```
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