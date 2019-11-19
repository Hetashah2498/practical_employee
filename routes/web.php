<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','Auth\LoginController@getLogin');
Route::get('/register','Auth\RegisterController@getRegister');
 
Route::post('/register','Auth\RegisterController@postRegister');
Route::post('/login','Auth\LoginController@postLogin');
 
Route::group(['middleware' => 'userAuth'], function () {
    Route::get('/home', 'HomeController@home');
    Route::get('/logout', 'Auth\LoginController@logoutUser');
    Route::resource('employee', 'EmployeeController');
});
