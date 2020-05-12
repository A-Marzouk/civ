<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'user/'], function () {

// skills api routes:
    //list skills
    Route::get('/skills', 'API\SkillsController@index');
    //list single skill
    Route::get('/skills/{id}', 'API\SkillsController@show');
    //create new skill
    Route::post('/skills', 'API\SkillsController@store');
    //create many skill
    Route::post('/skills-many', 'API\SkillsController@storeMany');
    //update a skill
    Route::put('/skills', 'API\SkillsController@store');
    //delete skill
    Route::delete('skills/{id}', 'API\SkillsController@destroy');


// Hobbies api routes:
    //list skills
    Route::get('/hobbies', 'API\HobbiesController@index');
    //list single skill
    Route::get('/hobbies/{id}', 'API\HobbiesController@show');
    //create new skill
    Route::post('/hobbies', 'API\HobbiesController@store');
    //update a skill
    Route::put('/hobbies', 'API\HobbiesController@store');
    //delete skill
    Route::delete('hobbies/{id}', 'API\HobbiesController@destroy');



// Themes api routes:
    Route::get('/themes-list', 'API\ThemesController@themesList');



// Education api routes:
    //list education
    Route::get('/education', 'API\EducationController@index');
    //list single education
    Route::get('/education/{id}', 'API\EducationController@show');
    //create new education
    Route::post('/education', 'API\EducationController@store');
    //create many educations
    Route::post('/education-many', 'API\EducationController@storeMany');
    //update a education
    Route::put('/education', 'API\EducationController@store');
    //delete education
    Route::delete('education/{id}', 'API\EducationController@destroy');


// WorkEx api routes:
    //list workExperience
    Route::get('/work-experience', 'API\WorkExController@index');
    //list single workExperience
    Route::get('/work-experience/{id}', 'API\WorkExController@show');
    //create new workExperience
    Route::post('/work-experience', 'API\WorkExController@store');
    //create many workExperience
    Route::post('/work-experience-many', 'API\WorkExController@storeMany');
    //update a workExperience
    Route::put('/work-experience', 'API\WorkExController@store');
    //delete workExperience
    Route::delete('work-experience/{id}', 'API\WorkExController@destroy');

// Personal info api routes:
    Route::get('/personal-info', 'API\PersonalInfoController@index');
    Route::put('/personal-info', 'API\PersonalInfoController@store');
    Route::put('/personal-info/location', 'API\PersonalInfoController@storeLocation');
    Route::put('/personal-info/single-field', 'API\PersonalInfoController@updateSingleField');

//  Account user data:
    Route::post('/account/submit', 'API\UsersController@editAccountData')->name('account.edit');
    Route::post('/account/validate', 'API\UsersController@validateSingleField')->name('account.validate');

// update activity
    Route::post('/update-last-activity', 'API\UsersController@updateLastActivity')->name('account.validate');

//  update user theme :
    Route::put('/update-theme', 'API\UsersController@updateUserTheme');

// Links api routes:
    Route::get('/links', 'API\LinksController@index');
    Route::get('/links/{id}', 'API\LinksController@show');
    Route::post('/links', 'API\LinksController@store');
    Route::put('/links', 'API\LinksController@store');
    Route::delete('/links/{id}', 'API\LinksController@destroy');

// Languages api routes:
    Route::get('/languages', 'API\LanguagesController@index');
    Route::get('/languages-list', 'API\LanguagesController@languagesList');
    Route::post('/languages', 'API\LanguagesController@store');
    Route::post('/languages-many', 'API\LanguagesController@storeMany');
    Route::delete('/languages/{id}/{user_id}', 'API\LanguagesController@destroy');

// Projects api routes:
    Route::get('/projects', 'API\ProjectsController@index');
    Route::get('/projects/{id}', 'API\ProjectsController@show');
    Route::post('/projects', 'API\ProjectsController@store');
    Route::put('/projects', 'API\ProjectsController@store');
    Route::delete('/projects/{id}', 'API\ProjectsController@destroy');

// Achievements api routes:
    Route::get('/achievements', 'API\AchievementsController@index');
    Route::get('/achievements/{id}', 'API\AchievementsController@show');
    Route::post('/achievements', 'API\AchievementsController@store');
    Route::put('/achievements', 'API\AchievementsController@store');
    Route::delete('/achievements/{id}', 'API\AchievementsController@destroy');


// Media api routes:
    Route::get('/media', 'API\MediaController@index');
    Route::get('/media/{id}', 'API\MediaController@show');
    Route::post('/media', 'API\MediaController@store');
    Route::put('/media', 'API\MediaController@store');
    Route::delete('/media/{id}', 'API\MediaController@destroy');


// Payment info api routes:
    Route::get('/payment-info', 'API\PaymentInfoController@index');
    Route::put('/payment-info', 'API\PaymentInfoController@store');

// Availability info api routes:
    Route::get('/availability-info', 'API\AvailabilityInfoController@index');
    Route::put('/availability-info', 'API\AvailabilityInfoController@store');

// References api routes:
    Route::get('/reference', 'API\ReferencesController@index');
    Route::put('/reference', 'API\ReferencesController@store');

// Referee api routes:
    Route::get('/referee', 'API\RefereeController@index');
    Route::put('/referee', 'API\RefereeController@store');

// Imports api routes:
    Route::get('/imports', 'API\ImportsController@index');
    Route::get('/imports/{id}', 'API\ImportsController@show');
    Route::post('/imports', 'API\ImportsController@store');
    Route::put('/imports', 'API\ImportsController@store');
    Route::delete('/imports/{id}', 'API\ImportsController@destroy');

// Testimonials api routes:
    Route::get('/testimonials', 'API\TestimonialsController@index');
    Route::get('/testimonials/{id}', 'API\TestimonialsController@show');
    Route::post('/testimonials', 'API\TestimonialsController@store');
    Route::put('/testimonials', 'API\TestimonialsController@store');
    Route::delete('/testimonials/{id}', 'API\TestimonialsController@destroy');


// Summary api routes:
    Route::get('/summary', 'API\SummaryController@index');
    Route::put('/summary', 'API\SummaryController@store');
});


// API Authentication routes
Route::post('login', 'API\Auth\AuthController@login')->name('api.login');
Route::post('register', 'API\Auth\AuthController@register');
Route::post('civ_register', 'API\Auth\AuthController@register');
Route::post('logout', 'API\Auth\AuthController@logout');

// API Admin routes
Route::group(['prefix' => 'admin/'], function () {
    Route::post('create-user', 'API\Admin\UsersController@createUser');
    Route::put('update-user', 'API\Admin\UsersController@updateUser');
    Route::delete('delete-user/{id}', 'API\Admin\UsersController@deleteUser');
});


// API users routes
Route::get('user', 'API\UsersController@user');

