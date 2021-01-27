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

Auth::routes(['login' => false, 'register' => false]);

Route::post('/login_email', 'Auth\LoginController@loginByEmail')->name('login.email');
Route::post('/user_register', 'Auth\RegisterController@registerUser')->name('user.register');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::get('/update_location_image', 'Cron@updateLocationImage');

Route::get('/auth/redirect-google', 'Auth\LoginController@redirectToGoogleProvider')->name('login.google');
Route::get('/auth/callback-google', 'Auth\LoginController@handleGoogleProviderCallback');

Route::get('/auth/redirect-facebook', 'Auth\LoginController@redirectToFacebookProvider')->name('login.facebook');
Route::get('/auth/callback-facebook', 'Auth\LoginController@handleFacebookProviderCallback');

Route::post('/password/new', 'ProfileController@resetPassword')->name('password.new');
//Route::get('/register','HomeController@register')->name('register');
//Route::get('/login','HomeController@login')->name('login');

Route::get('/register_steps', 'HomeController@register_steps')->name('register_steps');
Route::post('/register_steps', 'HomeController@register_steps')->name('register_steps');
Route::post('/save_steps', 'HomeController@save_steps')->name('save_steps');
Route::post('save_email_step', 'HomeController@saveEmailStep')->name('save_email_step');
Route::post('/save_email_step', 'HomeController@saveEmailStep')->name('save_email_step');

Route::middleware(['redirect_after_login'])->group(function() {
  Route::get('/', 'HomeController@index')->name('backhome');
  Route::get('/home', 'HomeController@index')->name('home');
});

Route::middleware(['auth:web'])->group(function ()
{
    // Route::get('/', 'AccountController@index')->name('backhome');
    Route::get('/home', 'AccountController@index')->name('home');
    Route::get('/account', 'AccountController@index')->name('account');
    Route::post('/profile/save', 'ProfileController@save')->name('profile.save');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile/save_preferences', 'ProfileController@savePreferences')->name('profile.save_preferences');
    Route::post('/profile/save_services', 'ProfileController@saveServices')->name('profile.save_services');
    Route::post('/profile/save_location', 'ProfileController@saveLocation')->name('profile.save_location');
    Route::post('/locations/blacklist', 'LocationController@blacklist')->name('locations.blacklist');
    Route::post('/properties/fave', 'HousingController@fave')->name('properties.fave');
    Route::get('/properties/{location_seo_name}', 'HousingController@list')->name('properties.list');
    Route::post('/properties/{location_seo_name}', 'AccountController@properties')->name('properties');
    Route::get('/property/book/{id}', 'HousingController@book')->name('property.book');
    Route::post('/property/save', 'HousingController@bookSave')->name('property.save');
    Route::get('/property/{id}', 'HousingController@index')->name('property');
    Route::get('/favorites', 'FavoritesController@index')->name('favorites');
});

Route::post('/locations/fave', 'LocationController@fave')->name('locations.fave');
Route::post('/locations/autocomplete', 'LocationController@autocomplete')->name('locations.autocomplete');
Route::post('/locations/find', 'LocationController@find')->name('locations.find');
Route::post('/locations/search', 'LocationController@search')->name('locations.search');
Route::post('/locations/search_area', 'LocationController@search_area')->name('locations.search_area');
Route::post('/location/increment_views', 'LocationController@incrementViews')->name('location.increment_views');
Route::get('/location/{seo_name}', 'LocationController@index')->name('location');
Route::get('/locations', 'LocationController@list')->name('location.list');

Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('privacy_policy');
Route::get('/terms-of-use', 'HomeController@termsOfUse')->name('terms_of_use');
Route::get('/about', 'HomeController@about')->name('about');
Route::post('/about', 'ContactController@store');
Route::get('/community', 'CommunityController@index')->name('community');
Route::post('/category/topics', 'CommunityController@category_topics')->name('category.topics');
Route::post('/topic/add', 'CommunityController@add_topic')->name('topic.new');
Route::get('/topic/search', 'CommunityController@search_topics')->name('topic.search');
Route::post('/topic/search', 'CommunityController@search_topics')->name('topic.search');
Route::get('/topic/{id}/show', 'CommunityController@show_topic')->name('topic.show');
Route::post('/answer/save', 'CommunityController@save_answer')->name('answer.save');
Route::get('/forum', 'CommunityController@index')->name('forum');
Route::get('/forum-detail', 'HomeController@forum_detail')->name('forum-detail');
Route::post('/likes/add', 'CommunityController@like')->name('likes.add');

Route::get('/landing', 'HomeController@landing')->name('landing');
Route::get('/tasks', 'HomeController@task')->name('task');
Route::post('/join', 'HomeController@join_login')->name('join');
//Route::get('/logout','HomeController@logout')->name('logout');
Route::get('/finance', 'HomeController@finance')->name('finance');
Route::get('/affiliate/{id}', 'PartnerController@affiliate')->name('affiliate');
Route::post('/relocation/save', 'PartnerController@relocationSave')->name('relocation.save');
Route::get('/relocation/{id}', 'PartnerController@relocation')->name('relocation');
Route::post('/relocation', 'PartnerController@relocation')->name('relocation.any');
Route::post('/partner/increment_views', 'PartnerController@incrementViews')->name('partner.increment_views');
Route::get('/dashboard', 'AccountController@index')->name('dashboard');
Route::get('/not-found', 'HomeController@not_found')->name('not-found');
Route::get('/comparison/{id}', 'ProductController@comparison')->name('comparison');