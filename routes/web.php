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

use App\Mail\PasswordResetMail;

Auth::routes(['verify' => true]);

// public routes
Route::get('/preview/{theme_id}/{slug?}', 'ResumeController@themePreview'); // resume preview
Route::get('/preview-by-code/{theme_code}', 'ResumeController@themePreviewByCode'); // resume preview by code

Route::get('/api/docs', 'HomeController@docs'); // API Docs
Route::get('/api/docs/{any}', 'HomeController@docs'); // API Docs

// Download Resume routes
Route::get('/download/resume/{themeCode}/{userName}', 'ResumeController@downloadPDFResume');

// Test theme preview
Route::get('/preview-theme-pdf-by-code/{themeCode}', 'ResumeController@downloadPDFResume');

Route::get('/', 'HomeController@welcome')->name('home');
Route::get('/pricing', 'HomeController@pricing')->name('pricing');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/terms', 'HomeController@terms')->name('terms');



// social sites register & login:
Route::post('/simple-register', 'Auth\SocialSitesRegisterController@simpleRegister')->name('simple.register');
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
Route::post('/validate-username', 'Auth\SocialSitesRegisterController@validateUsername')->name('username.validate');

// spotify:
Route::get('/redirect/spotify', 'Social\SpotifyController@redirectToSpotifyProvider')->name('client.github.register');
Route::get('/spotify/callback', 'Social\SpotifyController@handleSpotifyProviderCallback')->name('client.github.callback');


// resume builder main routes.
Route::get('/resume-builder/{any?}', 'ResumeBuilderController@index')->name('resume.builder.main');
Route::get('/resume-builder/edit/{any?}', 'ResumeBuilderController@index')->name('resume.builder.edit');
Route::get('/resume-builder/edit/projects/new', 'ResumeBuilderController@index')->name('resume.builder.edit');
Route::post('/resume-builder/import/pdf', 'ImportsController@extractTextFromPDF')->name('pdf.import.submit');
Route::post('/resume-builder/import/docx', 'ImportsController@extractTextFromDocx')->name('docx.import');
Route::get('/resume-builder/import/behance/{behanceUsername}', 'ImportsController@getDataFromBehance')->name('behance.import');


// subscription routes
Route::get('/subscribe', 'SubscriptionController@subscribePage')->name('subscribe.page');

Route::get('/subscription', 'SubscriptionController@index')->name('subscription');
Route::get('/subscription/cancel', 'SubscriptionController@cancel')->name('subscription.cancel');
Route::get('/subscription/success', 'SubscriptionController@subscriptionSuccess')->name('subscription.success');
Route::post('/subscribe', 'SubscriptionController@subscribeStripe')->name('subscribe.stripe');

// paypal

Route::get('/subscribe/create-paypal-plan/{plan_period}', 'PaypalController@create_plan');
Route::get('/subscribe/paypal/monthly', 'PaypalController@subscribePayPalMonthly')->name('paypal.redirect.monthly');
Route::get('/subscribe/paypal/yearly', 'PaypalController@subscribePayPalYearly')->name('paypal.redirect.yearly');
Route::get('/subscribe/paypal/return', 'PaypalController@paypalReturn')->name('paypal.return');




// admin routes:


// Admin routes
Route::group(['prefix' => 'workforce-admin'], function () {
    Route::get('/', 'AdminsController@index')->name('admin.dashboard');
    Route::get('/{any}', 'AdminsController@index')->name('admin.dashboard');
    Route::get('/{username}/resume-builder/', 'AdminsController@userFullEdit')->name('admin.user_edit');
    Route::get('/{username}/resume-builder/{any?}', 'AdminsController@userFullEdit')->name('admin.resume.builder.main');
    Route::get('/{username}/resume-builder/edit/{any?}', 'AdminsController@userFullEdit')->name('admin.resume.builder.edit');
    Route::get('/{username}/resume-builder/edit/projects/new', 'AdminsController@userFullEdit')->name('admin.resume.builder.edit');
    Route::get('/developer/api', 'APIController@APIClients')->name('create.api.client');
});

// public cv url
Route::get('/{username}/reference', 'ResumeController@externalReferencePage'); // external reference
Route::get('/{username}/{version?}', 'ResumeController@userResume'); // resume with real user data


