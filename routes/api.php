<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => ['auth:api','role:super-admin']], function(){
	Route::post('details', 'API\UserController@details');
});

// Route::group(['middleware' => ['role:admin']], function () {
//     Route::post('details', 'API\UserController@details');
// });
//Route::get('/', 'PostController@index')->name('home');

Route::resource('users', 'API\UserController');

Route::resource('roles', 'API\RoleController');

Route::resource('permissions', 'API\PermissionController');

//Route::resource('posts', 'PostController');