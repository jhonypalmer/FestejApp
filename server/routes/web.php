<?php

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

/**
 * @var \Laravel\Lumen\Routing\Router $router
 */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('login', 'AuthController@authenticate');
    $router->group(['prefix' => 'usuario'], function () use ($router) {
        $router->post('', 'UsuarioController@create');
        $router->group(['middleware' => 'jwt.auth'], function () use ($router) {
            $router->get('', 'UsuarioController@read');
            $router->get('{id}', 'UsuarioController@read');
            $router->put('{id}', 'UsuarioController@update');
            $router->delete('{id}', 'UsuarioController@delete');
        });
    });
    $router->group(['prefix' => 'evento'], function () use ($router) {
        $router->get('', 'EventoController@read');
        $router->get('{id}', 'EventoController@read');
        $router->group(['middleware' => 'jwt.auth'], function () use ($router) {
            $router->post('', 'EventoController@create');
            $router->post('add-foto/{id}', 'EventoController@postAddFotoEvento');
            $router->put('{id}', 'EventoController@update');
            $router->delete('{id}', 'EventoController@delete');
        });
    });
});
