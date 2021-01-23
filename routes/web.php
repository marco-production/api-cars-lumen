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

/* User Endpoint */
//READ
$router->get('/users[/{slug}]', [ 'uses' => 'UserController@getUsers', 'as' => 'users']);


/* Vehicle Endpoint */
//CREATE
$router->post('/vehicles', [ 'uses' => 'MainController@createVehicle']);

//READ
$router->get('/vehicles[/{slug}]', [ 'uses' => 'MainController@getVehicles', 'as' => 'Vehicles']);

//UPDATE
$router->post('/vehicles/{id}', [ 'uses' => 'MainController@updateVehicle']);

//DELETE
$router->delete('/vehicles/{id}', [ 'uses' => 'MainController@deleteVehicle']);


/* Make Endpoint */
//CREATE
$router->post('/makes', [ 'uses' => 'MainController@createMake']);

//READ
$router->get('/makes', [ 'uses' => 'MainController@getMakes', 'as' => 'makes']);

//UPDATE
$router->put('/makes/{id}', [ 'uses' => 'MainController@updateMake']);

//DELETE
$router->delete('/makes/{id}', [ 'uses' => 'MainController@deleteMake']);


/* Model Endpoint */
//CREATE
$router->post('/models', [ 'uses' => 'MainController@createModel']);

//READ
$router->get('/models[/{make}]', [ 'uses' => 'MainController@getModels', 'as' => 'models']);

//UPDATE
$router->put('/models/{id}', [ 'uses' => 'MainController@updateModel']);

//DELETE
$router->delete('/models/{id}', [ 'uses' => 'MainController@deleteModel']);


/* Fuel Endpoint */
//CREATE
$router->post('/fuels', [ 'uses' => 'MainController@createFuel']);

//READ
$router->get('/fuels', [ 'uses' => 'MainController@getFuels', 'as' => 'Fuels']);

//UPDATE
$router->put('/fuels/{id}', [ 'uses' => 'MainController@updateFuel']);

//DELETE
$router->delete('/fuels/{id}', [ 'uses' => 'MainController@deleteFuel']);


/* VehicleType Endpoint */
//CREATE
$router->post('/vehicletypes', [ 'uses' => 'MainController@createVehicleType']);

//READ
$router->get('/vehicletypes', [ 'uses' => 'MainController@getVehicleTypes', 'as' => 'VehicleTypes']);

//UPDATE
$router->put('/vehicletypes/{id}', [ 'uses' => 'MainController@updateVehicleType']);

//DELETE
$router->delete('/vehicletypes/{id}', [ 'uses' => 'MainController@deleteVehicleType']);


/* Api Index */
$router->get('/', function () use ($router) {
    return '<b>Marco Antonio De la cruz Santos</b><br>'.$router->app->version().'<br>'
    .'<pre style="color:#FFF;width:400px;background-color:#333;overflow:auto;border-radius:5px;
    border:2px solid #FFF;padding: 0.8em 1em;font-size: 0.9em;">
    <b>Api key | <u>Header</u></b>: api_token = <i style="color:yellow;">yJsEhmB5HpnuvPMu</i></pre>
    <h1 style="color:#4a4a4a;font-weight:inherit;">CARS | Endpoints</h1><p style="margin-bottom:0;font-family:monospace;">
    Vehicles</p><pre style="color:#FFF;width:400px;background-color:#333;overflow:auto;border-radius:5px;
    border:2px solid #FFF;padding: 0.8em 1em;font-size: 0.9em;">
    <b>GET</b> - http://cars.laradex.com/vehicles[/{slug}]

    <b>POST</b> - http://cars.laradex.com/vehicles

    <b>POST - UPDATE</b> - http://cars.laradex.com/vehicles/{id}

    <b>DELETE</b> - http://cars.laradex.com/vehicles/{id}</pre>
    <p style="margin-bottom:0;font-family:monospace;">Vehicle types</p>
    <pre style="color:#FFF;width:400px;background-color:#333;overflow:auto;
    border-radius:5px;border:2px solid #FFF;padding: 0.8em 1em;font-size: 0.9em;">
    <b>GET</b> - http://cars.laradex.com/vehicletypes

    <b>POST</b> - http://cars.laradex.com/vehicletypes

    <b>PUT</b> - http://cars.laradex.com/vehicletypes/{id}

    <b>DELETE</b> - http://cars.laradex.com/vehicletypes/{id}</pre>
    <p style="margin-bottom:0;font-family:monospace;">Makes</p>
    <pre style="color:#FFF;width:400px;background-color:#333;overflow:auto;
    border-radius:5px;border:2px solid #FFF;padding: 0.8em 1em;font-size: 0.9em;">
    <b>GET</b> - http://cars.laradex.com/makes

    <b>POST</b> - http://cars.laradex.com/makes

    <b>PUT</b> - http://cars.laradex.com/makes/{id}

    <b>DELETE</b> - http://cars.laradex.com/makes/{id}</pre>
    <p style="margin-bottom:0;font-family:monospace;">Models</p>
    <pre style="color:#FFF;width:400px;background-color:#333;overflow:auto;
    border-radius:5px;border:2px solid #FFF;padding: 0.8em 1em;font-size: 0.9em;">
    <b>GET</b> - http://cars.laradex.com/models[/{make_id}]

    <b>POST</b> - http://cars.laradex.com/models

    <b>PUT</b> - http://cars.laradex.com/models/{id}

    <b>DELETE</b> - http://cars.laradex.com/models/{id}</pre>
    <p style="margin-bottom:0;font-family:monospace;">Fuels</p>
    <pre style="color:#FFF;width:400px;background-color:#333;overflow:auto;
    border-radius:5px;border:2px solid #FFF;padding: 0.8em 1em;font-size: 0.9em;">
    <b>GET</b> - http://cars.laradex.com/fuels

    <b>POST</b> - http://cars.laradex.com/fuels

    <b>PUT</b> - http://cars.laradex.com/fuels/{id}

    <b>DELETE</b> - http://cars.laradex.com/fuels/{id}</pre>';
});