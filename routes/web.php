<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\verify_is_admin;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('home-page','HomePageController@index')->name('home-page');

Auth::routes();

Route::get('/users/{user}/profile','UserController@edit')->name('user.edit');
Route::post('/users/{user}/profile','UserController@update')->name('user.update');


Route::middleware(['auth','admin'])->group(function(){
    Route::get('/users','UserController@index')->name('admin.index');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

// Route::get('login/google', 'Auth\LoginController@redirectToProvider');
// Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
