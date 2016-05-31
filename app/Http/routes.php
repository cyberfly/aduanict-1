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

//Route::get('/', function () {
//    return view('layout/home');
//});

/*Route::get('aduan/index', function () {
    return view('complains/index');
});

Route::get('aduan/create', function () {
    return view('complains/create');
});

Route::get('aduan/edit', function () {
    return view('complains/edit');
});

Route::get('aduan/show', function () {
    return view('complains/show');
});*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('complain/{id}/action','ComplainController@action')->name('complain.action');
Route::put('complain/{id}','ComplainController@update_action')->name('complain.update_action');
Route::get('complain/assets','ComplainController@get_assets');
Route::get('complain/locations','ComplainController@get_location');
Route::resource('complain','ComplainController');

Route::auth();

Route::get('/home', 'HomeController@index');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('home', 'Admin\AdminHomeController@index');
    Route::resource('users', 'Admin\AdminUsersController');
    Route::resource('roles', 'Admin\AdminRolesController');
    Route::resource('permissions', 'Admin\AdminPermissionsController');
});