<?php

use App\Events\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\verify_is_admin;
use App\User;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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





Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {


    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin', 'HomeController@index')->name('home');
    });


    Route::namespace('admin')->prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryBlogController');
        Route::resource('scholarships', 'ScholarshipController');
        Route::resource('services', 'ServiceController');
        Route::resource('costs', 'CostController');
        Route::resource('jobs', 'JobController');
        Route::resource('types', 'TypeController');
        Route::resource('specializations', 'SpecializationController');
        Route::resource('languages', 'LanguageController');
        Route::resource('faqs', 'FaqController');
        Route::resource('contacts', 'ContactController');
        Route::resource('blogs', 'BlogController');
        Route::resource('jobapps', 'JobappController');
        Route::resource('appscholarships', 'AppscholarshipController');
        Route::resource('organizations', 'OrganizationController');
        Route::resource('newsorgs', 'NewsorgController');
        Route::resource('opportunitys', 'OpportunityController');
        Route::resource('bestscholars', 'BestscholarController');
        Route::resource('bestjobs', 'BestjobController');
        Route::resource('bestservices', 'BestserviceController');
        Route::resource('bestorganizations', 'BestorganizationController');
    });


    Route::namespace('user')->name('user.')->group(function () {
        Route::resource('users', 'UserController');
        Route::resource('friends', 'FriendController');
        Route::post('friendrequest', 'FriendController@friendrequest');
        Route::get('myfriends', 'FriendController@myfriends')->name('myfriends');
        Route::post('friendaccept', 'FriendController@friendaccept');
        Route::post('frienddelete', 'FriendController@frienddelete');
        Route::resource('scholarships', 'ScholarshipController');
        Route::resource('scholarshipcomments', 'ScholarshipcommentController');
        Route::resource('appscholars', 'AppscholarController');
        Route::resource('scholarshiprates', 'ScholarshiprateController');
        Route::resource('contacts', 'ContactController');
        Route::resource('services', 'ServiceController');
        Route::get('servicesearch', 'ServiceController@search')->name('servicesearch');
        Route::resource('commentjobs', 'CommentjobController');
        Route::resource('ratejobs', 'RatejobController');
        Route::resource('jobs', 'JobController');
        Route::get('jobsearch', 'JobController@search')->name('jobsearch');
        Route::resource('jobapps', 'JobappController');
        Route::resource('faqs', 'FaqController');
        Route::resource('favouritesers', 'FavouriteserController');
        Route::resource('newscomments', 'NewscommentController');
        Route::resource('homepages', 'HomePageController');
        Route::resource('categoryblogs', 'CategoryblogController');
        Route::resource('blogs', 'BlogController');
        Route::resource('favblogs', 'FavblogController');
        Route::resource('favscholars', 'FavscholarController');
        Route::resource('newsorgs', 'NewsorgController');
        Route::resource('newslike', 'NewslikeController');
        Route::resource('likeblogs', 'LikeblogController');
        Route::resource('likescholars', 'LikescholarController');
        Route::resource('blogcomments', 'BlogcommentController');
        Route::resource('organizations', 'OrganizationController');
        Route::resource('followerorgs', 'FollowerorgController');
        Route::resource('rateorgs', 'RateorgController');
        Route::resource('ratesers', 'RateserController');
        Route::resource('rateblogs', 'RateblogController');
        Route::resource('opportunitys', 'OpportunityController');
    });
});
//======================================= Chatting =====================================

Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat.index');
Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');
Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');


//======================================= login with facebook =====================================
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
//======================================= login with google =====================================
Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');
