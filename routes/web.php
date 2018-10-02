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

$router->get('/', 'HomeController@index'); // Show a simple homepage

/*
/--------------------
/    API routes
/--------------------
*/

// Appreciations routes
$router->get('/api/appreciations', 'AppreciationController@index'); //All appreciations
$router->post('/api/appreciations', 'AppreciationController@store'); //Create appreciation
$router->get('/api/appreciations/{id}', 'AppreciationController@show'); //Show specific appreciation
$router->put('/api/appreciations/{id}', 'AppreciationController@update'); //Update specific appreciation
$router->delete('/api/appreciations/{id}', 'AppreciationController@destroy'); //Delete specific appreciation

// Categories routes
$router->get('/api/categories', 'CategoryController@index'); //All categories
$router->post('/api/categories', 'CategoryController@store'); //Create category
$router->get('/api/categories/{id}', 'CategoryController@show'); //Show specific category
$router->put('/api/categories/{id}', 'CategoryController@update'); //Update specific category
$router->delete('/api/categories/{id}', 'CategoryController@destroy'); //Delete specific category