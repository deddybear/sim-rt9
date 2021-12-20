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

$router->get('/', function () use ($router) {
    // return $router->app->version();

    return Str::random(32);
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/',        'UsersController@read');
    $router->get('/{id}',    'UsersController@get');
    $router->post('/',       'UsersController@create');
    $router->patch('/{id}',  'UsersController@update');
    $router->delete('/{id}', 'UsersController@delete');
});

$router->group(['prefix' => 'hutang'], function () use ($router) {
    $router->get('/',       'DebtController@read');
    $router->get('/{id}',   'DebtController@get');
    $router->post('/',      'DebtController@create');
    $router->patch('/{id}', 'DebtController@update');
    $router->delete('/{id}','DebtController@delete');
});

$router->group(['prefix' => 'iuran'], function () use ($router) {
    $router->get('/',       'TaxController@read');
    $router->get('/{id}',   'TaxController@get');
    $router->post('/',      'TaxController@create');
    $router->patch('/{id}', 'TaxController@update');
    $router->delete('/{id}','TaxController@delete');
});