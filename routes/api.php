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


Route::post('user', 'UserController@create');
Route::get('getuser/{id}', 'UserController@getUser');
Route::get('getusers', 'UserController@getall');
Route::patch('patchuser', 'UserController@update');
Route::delete('deleteuser/{id}', 'UserController@delete');
Route::post('createroom', 'RoomController@create');
Route::get('getrooms/{user_id}', 'RoomController@getrooms');
Route::get('getallrooms', 'RoomController@getallrooms');
Route::get('getroom/{room_id}', 'RoomController@getroom');
Route::delete('deleteroom/{room_id}', 'RoomController@destroy');
Route::patch('updateroom', 'RoomController@update'); 
Route::patch('updatetemp', 'RoomController@updatemxtemp'); 
Route::patch('updatehum', 'RoomController@updatemxhum'); 
Route::get('getroomdata/{room_id}', 'RoomController@getRoomdata'); 
Route::post('createroomdata', 'RoomController@createRoomdata'); 
Route::get('getroom5mesures/{room_id}', 'RoomController@get_last5_mesure');   
Route::patch('updatename', 'RoomController@updatename'); 
Route::post('restoreroom', 'RoomController@restore');
Route::get('getallsensors', 'SensorController@getallsensors');
Route::delete('deletesensor/{sensor_id}', 'SensorController@destroy');
Route::patch('editsensor', 'SensorController@update');
Route::post('createsensor', 'SensorController@create');

