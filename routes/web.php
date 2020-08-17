<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\verify_is_admin;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});


Route::namespace('admin')->prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryBlogController');
    Route::resource('scholarships', 'ScholarshipController');
    Route::resource('costs', 'CostController');
    Route::resource('jobs', 'JobController');
    Route::resource('blogs', 'blogs');
});


Route::namespace('user')->name('user.')->group(function () {
    Route::resource('users', 'UserController');
    Route::resource('homepages', 'HomePageController');
});

//======================================= login with facebook =====================================
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
//======================================= login with google =====================================
Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');

