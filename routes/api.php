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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//List all videos
Route::get('videos','VideoController@index');

//List Single Video
Route::get('video/{id}','VideoController@show');

//Create New Video
Route::post('video','VideoController@store');

//Update Video
Route::put('video','VideoController@store');

//Delete Video
Route::delete('video/{id}','VideoController@destroy');

