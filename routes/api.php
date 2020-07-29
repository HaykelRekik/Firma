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
Route::get('getLast5Records/{room_id}', 'RoomController@Last5Records'); 
Route::post('createroomdata', 'RoomController@createRoomdata'); 
Route::get('getroom24hmesures/{room_id}', 'RoomController@get_24h_mesure');   
Route::get('get_7j_mesure/{room_id}', 'RoomController@get_7j_mesure');   
Route::get('get_30j_mesure/{room_id}', 'RoomController@get_30j_mesure');   
Route::patch('updatename', 'RoomController@updatename'); 
Route::post('restoreroom', 'RoomController@restore');
Route::get('getallsensors', 'SensorController@getallsensors');
Route::get('roomsensors/{room_id}', 'SensorController@roomsensors');
Route::delete('deletesensor/{sensor_id}', 'SensorController@destroy');
Route::patch('editsensor', 'SensorController@update');
Route::patch('updatevalue', 'SensorController@updatevalue');
Route::post('createsensor', 'SensorController@create');
Route::get('get_24h_value/{room_id}', 'SensorController@get_24h_value');   
Route::get('get_7j_value/{room_id}', 'SensorController@get_7j_value'); 
Route::get('get_30j_value/{room_id}', 'SensorController@get_30j_value'); 
Route::get('/sensorPdf/{sensor_id}/{days}', 'SensorController@pdf');





