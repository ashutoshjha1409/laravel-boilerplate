<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* 
An endpoint is simply another term for a route. When talking about APIs many people refer to the routes you visit as an endpoint.
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->get('hello', function(){
		return 'hello';
	});
	$api->post('users/{user_id}/roles', 'App\Http\Controllers\HomeController@attachUserRole');
	$api->get('users/{user_id}/roles', 'App\Http\Controllers\HomeController@getUserRole');
	
	$api->post('roles/permission/add', 'App\Http\Controllers\HomeController@attachPermission');
	$api->get('roles/{role}/permission', 'App\Http\Controllers\HomeController@getPermissions');

	$api->post('authenticate', 'App\Http\Controllers\Auth\AuthController@authenticate');
});

$api->version('v1', ['middleware' => 'api.auth'], function($api){	
	$api->get('users', 'App\Http\Controllers\Auth\AuthController@show');	
});