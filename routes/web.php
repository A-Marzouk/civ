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



Auth::routes(['verify' => true]);


// public routes
Route::get('/preview/{themeCode}', 'ResumeController@themePreview'); // resume preview

// Download Resume routes
Route::get('/download/resume/{themeCode}/{userName}', 'ResumeController@downloadPDFResume');

Route::get('/', 'HomeController@welcome')->name('home');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/terms', 'HomeController@terms')->name('terms');

// routes need verification :
Route::get('/verified', 'HomeController@verified')->name('verified')->middleware('verified');


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


// resume builder main routes.
Route::get('/resume-builder/{any?}', 'ResumeBuilderController@index')->name('resume.builder.main');
Route::get('/resume-builder/edit/{any?}', 'ResumeBuilderController@index')->name('resume.builder.edit');
Route::get('/resume-builder/edit/projects/new', 'ResumeBuilderController@index')->name('resume.builder.edit');
Route::post('/resume-builder/account/submit', 'ResumeBuilderController@editAccountData')->name('account.edit');
Route::post('/resume-builder/account/validate', 'ResumeBuilderController@validateSingleField')->name('account.validate');
Route::post('/resume-builder/import/pdf', 'ImportsController@extractTextFromPDF')->name('pdf.import.submit');
Route::post('/resume-builder/import/docx', 'ImportsController@extractTextFromDocx')->name('docx.import');





// admin routes:


// Admin routes
Route::group(['prefix' => 'workforce-admin'], function () {
    Route::get('/', 'AdminsController@index')->name('admin.dashboard');
    Route::get('/{username}/resume-builder/', 'AdminsController@userFullEdit')->name('admin.user_edit');
    Route::get('/{username}/resume-builder/{any?}', 'ResumeBuilderController@index')->name('admin.resume.builder.main');
    Route::get('/{username}/resume-builder/edit/{any?}', 'ResumeBuilderController@index')->name('admin.resume.builder.edit');
    Route::get('/{username}/resume-builder/edit/projects/new', 'ResumeBuilderController@index')->name('admin.resume.builder.edit');
    Route::post('/{username}/resume-builder/account/submit', 'ResumeBuilderController@editAccountData')->name('admin.account.edit');
    Route::post('/{username}/resume-builder/account/validate', 'ResumeBuilderController@validateSingleField')->name('admin.account.validate');
    Route::post('/{username}/resume-builder/import/pdf', 'ImportsController@extractTextFromPDF')->name('admin.pdf.import.submit');
    Route::post('/{username}/resume-builder/import/docx', 'ImportsController@extractTextFromDocx')->name('admin.docx.import');
});

// passport clients route:
Route::get('/developer', 'APIController@APIClients')->name('create.api.client');


// public cv url

Route::get('/{username}', 'ResumeController@userResume'); // resume with real user data
