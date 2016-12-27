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
    'as' => 'user.index',
    'middleware'=>'guest'
]);
Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'as' => 'user.signup',
    'middleware'=>'guest'
]);
Route::get('/login', [
    'uses' => 'UserController@login',
    'as' => 'user.login',
    'middleware'=>'guest'
]);
Route::post('/loginpost', [
    'uses' => 'UserController@postLogin',
    'as' => 'user.postLogin',
    'middleware'=>'guest'
]);
Route::get('/profile', [
    'uses' => 'UserController@profile',
    'as' => 'user.profile',
    'middleware'=>'auth'
]);
Route::get('/logout', [
    'uses' => 'UserController@logout',
    'as' => 'user.logout',
    'middleware'=>'auth'
]);
Route::post('/update', [
    'uses' => 'UserController@updateUser',
    'as' => 'user.updateUser',
    'middleware'=>'auth'
]);