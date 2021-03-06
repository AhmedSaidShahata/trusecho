<?php

use App\Events\Chat;
use App\Http\Controllers\user\RegController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\verify_is_admin;
use App\User;
use Illuminate\Support\Facades\App;
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



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Auth::routes();
    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin', 'HomeController@index')->name('home');
    });

    Route::get('/reg', function () {
        $lang = App::getLocale();
        Route::resource('/'.$lang .'reg', 'RegController');
    });


    Route::namespace('admin')->prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryBlogController');
        Route::resource('scholarships', 'ScholarshipController');
        Route::resource('services', 'ServiceController');
        Route::resource('orderservices', 'OrderserviceController');
        Route::resource('reportjobs', 'ReportjobController');
        Route::resource('reportservices', 'ReportserviceController');
        Route::resource('costs', 'CostController');
        Route::resource('jobs', 'JobController');
        Route::resource('types', 'TypeController');
        Route::resource('typeorgs', 'TypeorgController');
        Route::resource('specializations', 'SpecializationController');
        Route::resource('scholarspecializes', 'ScholarspecializeController');
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
        Route::get('blogs_request', 'BlogController@request')->name('blogs.request');
        Route::post('blogs_accept', 'BlogController@accept');
        Route::resource('testimonials', 'TestimonialController');
        Route::resource('statitics', 'StatiticsController');

    });


    Route::namespace('user')->name('user.')->group(function () {

        Route::resource('regs', 'RegController');
        Route::get('/verify/{phone}', 'VerificationController@getVerify')->name('getverify');
        Route::post('/verify', 'VerificationController@postVerify')->name('verify');
        Route::post('/checkout', 'CheckoutController@checkout')->name('checkout');
        Route::resource('reportjobs', 'ReportjobController');
        Route::group(['middleware' => ['user-is-active']], function () {

            Route::resource('reportservices', 'ReportserviceController');
            Route::resource('homepages', 'HomePageController');
            Route::resource('users', 'UserController');
            Route::resource('friends', 'FriendController');
            Route::post('friendrequest', 'FriendController@friendrequest');
            Route::get('myfriends', 'FriendController@myfriends')->name('myfriends');
            Route::post('friendaccept', 'FriendController@friendaccept');
            Route::post('frienddelete', 'FriendController@frienddelete');
            Route::resource('scholarships', 'ScholarshipController');
            Route::resource('scholarshipcomments', 'ScholarshipcommentController');
            Route::resource('appscholars', 'AppscholarController');
            Route::post('appscholars-step2', 'AppscholarController@store2')->name('appscholar.store2');
            Route::post('appscholars-step3', 'AppscholarController@store3')->name('appscholar.store3');
            Route::resource('scholarshiprates', 'ScholarshiprateController');
            Route::resource('contacts', 'ContactController');
            Route::resource('services', 'ServiceController');
            Route::get('servicesearch', 'ServiceController@search')->name('servicesearch');
            Route::resource('commentjobs', 'CommentjobController');
            Route::resource('ratejobs', 'RatejobController');
            Route::resource('jobs', 'JobController');
            Route::get('jobsearch', 'JobController@search')->name('jobsearch');
            Route::get('scholarship-search', 'ScholarshipController@search')->name('scholarshipsearch');
            Route::resource('jobapps', 'JobappController');
            Route::resource('faqs', 'FaqController');
            Route::resource('favouritesers', 'FavouriteserController');
            Route::resource('newscomments', 'NewscommentController');

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
            Route::get('organizations_search', 'OrganizationController@search')->name('search_orgs');
            Route::resource('followerorgs', 'FollowerorgController');
            Route::resource('rateorgs', 'RateorgController');
            Route::resource('ratesers', 'RateserController');
            Route::resource('rateblogs', 'RateblogController');
            Route::resource('opportunitys', 'OpportunityController');
            Route::resource('testimonials', 'TestimonialController');
        });
    });
});
//======================================= Chatting =====================================
Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat.index');
Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');
Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');
//======================================= notification =====================================
Route::post('/notification/get', 'NotificationController@get');
Route::post('/notification/read', 'NotificationController@read');
//======================================= login with facebook =====================================
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
//======================================= login with google =====================================
Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');
