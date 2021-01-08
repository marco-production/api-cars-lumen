<?php

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
    return '<b>Marco Antonio De la cruz Santos</b>'.'<br>'.$router->app->version();
});

/* User Endpoint */
//READ
$router->get('/users[/{slug}]', [ 'uses' => 'UserController@getUsers', 'as' => 'users']);


/* Vehicle Endpoint */
//CREATE
$router->post('/vehicles', [ 'uses' => 'MainController@createVehicle']);

//READ
$router->get('/vehicles', [ 'uses' => 'MainController@getVehicles', 'as' => 'Vehicles']);

//UPDATE
$router->put('/vehicles/{id}', [ 'uses' => 'MainController@updateVehicle']);

//DELETE
$router->delete('/vehicles', [ 'uses' => 'MainController@deleteVehicle']);


/* Make Endpoint */
//CREATE
$router->post('/makes', [ 'uses' => 'MainController@createMake']);

//READ
$router->get('/makes', [ 'uses' => 'MainController@getMakes', 'as' => 'makes']);

//UPDATE
$router->put('/makes/{id}', [ 'uses' => 'MainController@updateMake']);

//DELETE
$router->delete('/makes', [ 'uses' => 'MainController@deleteMake']);


/* Model Endpoint */
//GET
//$router->get('/model[/{make}]', [ 'uses' => 'MainController@getMakeModels']);

//CREATE
$router->post('/models', [ 'uses' => 'MainController@createModel']);

//READ
$router->get('/models[/{make}]', [ 'uses' => 'MainController@getModels', 'as' => 'models']);

//UPDATE
$router->put('/models/{id}', [ 'uses' => 'MainController@updateModel']);

//DELETE
$router->delete('/models', [ 'uses' => 'MainController@deleteModel']);


/* Fuel Endpoint */
//CREATE
$router->post('/fuels', [ 'uses' => 'MainController@createFuel']);

//READ
$router->get('/fuels', [ 'uses' => 'MainController@getFuels', 'as' => 'Fuels']);

//UPDATE
$router->put('/fuels/{id}', [ 'uses' => 'MainController@updateFuel']);

//DELETE
$router->delete('/fuels', [ 'uses' => 'MainController@deleteFuel']);


/* VehicleType Endpoint */
//CREATE
$router->post('/vehicletypes', [ 'uses' => 'MainController@createVehicleType']);

//READ
$router->get('/vehicletypes', [ 'uses' => 'MainController@getVehicleTypes', 'as' => 'VehicleTypes']);

//UPDATE
$router->put('/vehicletypes/{id}', [ 'uses' => 'MainController@updateVehicleType']);

//DELETE
$router->delete('/vehicletypes', [ 'uses' => 'MainController@deleteVehicleType']);