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



//Likes Increment/decrement and count
Route::put('video/{id}/like_counter' ,'VideoController@likes_counter');

//Comments Increment/Decrement
Route::put('video/{id}/comment_counter' ,'VideoController@com_counter');

//List Videos Ordering by Search String
Route::get('videos/orderBy={key}/order={order}','VideoController@search');



//List All Users
Route::get('users','UsersController@index');

//List Single User
Route::get('user/{id}','UsersController@show');

//Create A New User
Route::post('user','UsersController@store');

//Update user
Route::put('user','UsersController@store');

//Delete user
Route::delete('user/{id}','UsersController@destroy');


//Comment for a single video
//Create A New comment
Route::post('add_comment','CommentController@store');

//Update a comment
Route::put('add_comment','CommentController@store');