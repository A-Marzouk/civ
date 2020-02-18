<?php

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


// resume controller routes:
Route::get('/preview/{themeCode}', 'ResumeController@themePreview');

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@welcome')->name('home');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/terms', 'HomeController@terms')->name('terms');


Route::get('/verified', 'HomeController@verified')->name('verified')->middleware('verified');

// social sites register & login:

Route::get('/register/github', 'Auth\SocialSitesRegisterController@redirectToGitHubProvider')->name('client.github.register');
Route::get('/register/github/callback', 'Auth\SocialSitesRegisterController@handleGitHubProviderCallback')->name('client.github.callback');

Route::get('/register/facebook', 'Auth\SocialSitesRegisterController@redirectToFaceBookProvider')->name('client.facebook.register');
Route::get('/register/facebook/callback', 'Auth\SocialSitesRegisterController@handleFaceBookProviderCallback')->name('client.facebook.callback');

Route::get('/register/instagram', 'Auth\SocialSitesRegisterController@redirectToInstagramProvider')->name('client.instagram.register');
Route::get('/register/instagram/callback', 'Auth\SocialSitesRegisterController@handleInstagramProviderCallback')->name('client.instagram.callback');

Route::get('/register/google', 'Auth\SocialSitesRegisterController@redirectToGoogleProvider')->name('client.google.register');
Route::get('/register/google/callback', 'Auth\SocialSitesRegisterController@handleGoogleProviderCallback')->name('client.google.callback');

Route::get('/register/linkedin', 'Auth\SocialSitesRegisterController@redirectToLinkedinProvider')->name('client.linkedin.register');
Route::get('/register/linkedin/callback', 'Auth\SocialSitesRegisterController@handleLinkedinProviderCallback')->name('client.linkedin.callback');


// resume builder main routes.
Route::get('/resume-builder/{any?}', 'ResumeBuilderController@index')->name('resume.builder.main');
Route::get('/resume-builder/edit/{any?}', 'ResumeBuilderController@index')->name('resume.builder.edit');
Route::post('/resume-builder/account/submit', 'ResumeBuilderController@editAccountData')->name('account.edit');
Route::post('/resume-builder/account/validate', 'ResumeBuilderController@validateSingleField')->name('account.validate');

// users controller routes
Route::get('/api/user/current', 'UsersController@currentUser')->name('current.user');
