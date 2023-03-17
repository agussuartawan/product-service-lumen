<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function() {
    return Str::random(32);
});

$router->group(['prefix' => 'api'], function() use ($router) {
    # Category
    $router->get('categories', 'CategoryController@index');
    $router->post('categories', 'CategoryController@store');
    $router->put('categories/{id}', 'CategoryController@update');
    $router->delete('categories/{id}', 'CategoryController@destroy');

    # Product
    $router->get('products', 'ProductController@index');
    $router->post('products', 'ProductController@store');
    $router->put('products/{id}', 'ProductController@update');
    $router->delete('products/{id}', 'ProductController@destroy');
});

