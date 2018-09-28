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

$router->get('/api/appreciations', 'AppreciationController@index'); //All appreciations
$router->post('/api/appreciations', 'AppreciationController@store'); //Create appreciation
$router->get('/api/appreciations/{id}', 'AppreciationController@show'); //Show specific appreciation