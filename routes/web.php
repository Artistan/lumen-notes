<?php
/** @var $router \Laravel\Lumen\Routing\Router */

$router->post('/authenticate', [
    'uses' => 'LoginController@authenticate',
    'as' => 'authenticate'
]);

$router->post('/notes', [
    'middleware' => 'auth',
    'uses' => 'NotesController@store',
    'as' => 'store_note'
]);

//$router->group(['middleware' => 'auth'], function () use ($router) {
//    $router->get('/', function () {
//        // Uses Auth Middleware
//    });
//
//    $router->get('user/profile', function () {
//        // Uses Auth Middleware
//    });
//});
