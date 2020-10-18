<?php

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

Route::get('/', 'PublicPageController@showHomepage');

// Route::get('/guestbook', 'PublicPageController@showGuestbook');

Route::get('/resume', 'PublicPageController@showResume');

Route::get('/history', 'PublicPageController@showHistory');

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('blade', function () {
//     return view('child');
// });

Route::get('/dashboard', 'AdminPageController@showResumeAdmin')->name('dashboard');

Route::get('/dashboard/comments', 'AdminPageController@showCommentsAdmin')->name('dashboard-comments');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('login', 'Auth\LoginController@login');

// Route::post('login', 'Auth\LoginController@login');


Auth::routes(['register' => false]);
Route::any('{all}', 'PublicPageController@show404Page')->where('all', '(.*)');
