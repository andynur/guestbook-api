<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

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
    $data = [
        'name' => config('app.name'),
        'version' => config('app.version'),
        'framework' => $router->app->version(),
        'environment' => config('app.env'),
        'debug_mode' => config('app.debug'),
        'timestamp' => Carbon::now()->toDateTimeString(),
        'timezone' => config('app.timezone'),
    ];

    return response()->json($data, Response::HTTP_OK);
});

$router->post('/auth', 'AuthController@store');
$router->group(['middleware' => 'auth:api', 'prefix' => 'auth'], function ($router) {
    $router->get('/', 'AuthController@show');
    $router->put('/', 'AuthController@update');
    $router->delete('/', 'AuthController@destroy');
});

$router->group(['middleware' => 'auth:api', 'prefix' => 'users'], function ($router) {
    $router->get('/', 'UserController@index');
    $router->post('/', 'UserController@store');
    $router->get('/{id:[0-9]+}', 'UserController@show');
    $router->put('/{id:[0-9]+}', 'UserController@update');
    $router->patch('/{id:[0-9]+}', 'UserController@update');
    $router->delete('/{id:[0-9]+}', 'UserController@destroy');
});


// Congrats
$router->group(['prefix' => 'congrats'], function ($router) {
    $router->get('/', 'CongratController@index');
    $router->post('/', 'CongratController@store');
});

// Whatsapp
$router->group(['prefix' => 'wa'], function ($router) {
    $router->get('/template', 'WhatsappController@template');
    $router->post('/template', 'WhatsappController@templateUpdate');
    $router->post('/send', 'WhatsappController@send');
});
