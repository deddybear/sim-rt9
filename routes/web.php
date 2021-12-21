<?php

use Illuminate\Support\Str;

/** @var \Laravel\Lumen\Routing\Router $router */

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

/* 
    Fitur ada

    Login | Logout | Register User
    Iuran (CRUD)
    Hutang (CRUD)
    Setting Profile (Update)

*/

$router->get('/', function () use ($router) {
    // return $router->app->version();

    return Str::random(32);
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('/login', 'AuthController@login');
    $router->delete('/logout', 'AuthController@logout');
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/',        'UsersController@read');
    $router->get('/{id}',    'UsersController@get');
    $router->post('/',       'UsersController@create');
    $router->put('/{id}',  'UsersController@update');
    $router->delete('/{id}', 'UsersController@delete');
});

$router->group(['prefix' => 'hutang'], function () use ($router) {
    $router->get('/',       'DebtController@read');
    $router->get('/{id}',   'DebtController@get');
    $router->post('/',      'DebtController@create');
    $router->put('/{id}',   'DebtController@update');
    $router->delete('/{id}','DebtController@delete');
});

$router->group(['prefix' => 'iuran'], function () use ($router) {
    $router->get('/',       'TaxController@read');
    $router->get('/{id}',   'TaxController@get');
    $router->post('/',      'TaxController@create');
    $router->put('/{id}', 'TaxController@update');
    $router->delete('/{id}','TaxController@delete');
});

