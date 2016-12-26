<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('user.signup');
});*/
Route::get('/', [
    'uses' => 'UserController@index',
    'as' => 'user.index'
]);
Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'as' => 'user.signup'
]);
Route::get('/login', [
    'uses' => 'UserController@login',
    'as' => 'user.login'
]);
Route::post('/loginpost', [
    'uses' => 'UserController@postLogin',
    'as' => 'user.postLogin'
]);
Route::get('/profile', [
    'uses' => 'UserController@profile',
    'as' => 'user.profile'
]);
Route::get('/logout', [
    'uses' => 'UserController@logout',
    'as' => 'user.logout'
]);