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

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/dash', function () {
    return view('dashboardc');
});




Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'HomeController@user')->name('user');
Route::get('/superviseurs', 'HomeController@superviseurs')->name('superviseurs');
Route::get('/chambres', 'HomeController@chambres')->name('chambres');
Route::get('/capteurs', 'HomeController@capteurs')->name('capteurs');
Route::get('/notifications', 'HomeController@notifications')->name('notifications');
Route::get('/editsuperviseurs', 'HomeController@editsuperviseurs')->name('editsuperviseurs');
Route::get('/test', 'HomeController@test')->name('test');
Route::get('/homec', 'HomeController@index2');

Auth::routes();


