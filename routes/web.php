<?php
/** @var $router \Laravel\Lumen\Routing\Router */

$router->get('/', [
    'as' => '/',
    function () {
        //dump(\Illuminate\Support\Facades\Auth::user());
        return app()->make('view')->make('login',request()->all());
    }
]);

$router->get('/logout', [
    'uses' => 'LoginController@logout',
    'as' => 'logout'
]);

$router->post('/authenticate', [
    'uses' => 'LoginController@authenticate',
    'as' => 'authenticate'
]);

$router->get('/notes', [
    'middleware' => 'auth',
    'uses' => 'NotesController@index',
    'as' => 'note.index'
]);

$router->get('/notes/create', [
    'middleware' => 'auth',
    'uses' => 'NotesController@create',
    'as' => 'note.create'
]);

$router->post('/notes/create', [
    'middleware' => 'auth',
    'uses' => 'NotesController@store',
    'as' => 'note.store'
]);

$router->get('/notes/{note}', [
    'middleware' => 'auth',
    'uses' => 'NotesController@edit',
    'as' => 'note.edit'
]);

$router->post('/notes/{note}', [
    'middleware' => 'auth',
    'uses' => 'NotesController@update',
    'as' => 'note.update'
]);

$router->delete('/notes/{note}', [
    'middleware' => 'auth',
    'uses' => 'NotesController@destroy',
    'as' => 'note.destroy'
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
