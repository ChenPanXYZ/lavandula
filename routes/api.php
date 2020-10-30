<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Auth::routes(['register' => false, 'logout' => false]);

// Comment API
// Route::post('comment', 'CommentController@add');
// Route::middleware('auth:api')->delete('comment', 'CommentController@delete');
// Route::middleware('auth:api')->put('comment', 'CommentController@modify');

// Resume API
Route::middleware('auth:api')->post('resume', 'ResumeController@add');
Route::middleware('auth:api')->delete('resume', 'ResumeController@delete');
Route::middleware('auth:api')->put('resume', 'ResumeController@update');
Route::middleware('api')->get('resume', 'ResumeController@getAll');

//counter
Route::put('like-dislike', 'CounterController@modify');