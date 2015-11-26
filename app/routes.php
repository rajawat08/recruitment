<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::resource('login', 'LoginController', ['only' => ['index', 'store']]);

Route::get('/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);
Route::post('ajax/add', "AjaxController@create");
Route::post('ajax/converttoclient', "AjaxController@convertToClient");

// resource controllers 
$options = ['except' => ['show']];
Route::resource('users', 'UsersController',$options);
Route::resource('roles', 'RolesController', $options);
Route::resource('permissions', 'PermissionsController', $options);
Route::resource('clients', 'ClientsController');
Route::resource('contacts', 'ContactsController');
Route::resource('leads', 'LeadsController');