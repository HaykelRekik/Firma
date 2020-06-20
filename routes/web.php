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
Route::get('/dashbor', function () {
    return view('dashbor');
});



//Routes

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'HomeController@user')->name('user');
Route::get('/superviseurs', 'HomeController@superviseurs')->name('superviseurs');
Route::get('/chambres', 'HomeController@chambres')->name('chambres');
Route::get('/capteurs', 'HomeController@capteurs')->name('capteurs');
Route::get('/notifications', 'HomeController@notifications')->name('notifications');
Route::get('/editsuperviseurs', 'HomeController@editsuperviseurs')->name('editsuperviseurs');
Route::get('/homec', 'HomeController@index2');
Route::get('/RoomsSensorsUser/{room_id}', 'RoomController@RoomsSensorsUser')->name('dashb');
Route::get('/roomssensors/{room_id}', 'SensorController@roomssensorsview');






Auth::routes();



Route::group(['middleware' => 'App\Http\Middleware\userMiddleware'], function()
{
    Route::match(['get', 'post'], '/home', 'HomeController@admin');
    Route::match(['get', 'post'], '/superviseurs', 'HomeController@superviseursad');
    Route::match(['get', 'post'], '/chambres', 'HomeController@chambres');
    Route::match(['get', 'post'], '/capteurs', 'HomeController@capteurs');
    Route::match(['get', 'post'], '/notifications', 'HomeController@notifications');

});


