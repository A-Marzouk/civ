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


// Education api routes:
    //list education
    Route::get('/education', 'API\EducationController@index');
    //list single education
    Route::get('/education/{id}', 'API\EducationController@show');
    //create new education
    Route::post('/education', 'API\EducationController@store');
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
    //update a workExperience
    Route::put('/work-experience', 'API\WorkExController@store');
    //delete workExperience
    Route::delete('work-experience/{id}', 'API\WorkExController@destroy');

// Personal info api routes:
    Route::get('/personal-info', 'API\PersonalInfoController@index');
    Route::get('/personal-info/{id}', 'API\PersonalInfoController@show');
    Route::post('/personal-info', 'API\PersonalInfoController@store');
    Route::put('/personal-info', 'API\PersonalInfoController@store');
    Route::delete('/personal-info/{id}', 'API\PersonalInfoController@destroy');

// Links api routes:
    Route::get('/links', 'API\LinksController@index');
    Route::get('/links/{id}', 'API\LinksController@show');
    Route::post('/links', 'API\LinksController@store');
    Route::put('/links', 'API\LinksController@store');
    Route::delete('/links/{id}', 'API\LinksController@destroy');


// Languages api routes:
    Route::get('/languages', 'API\LanguagesController@index');
    Route::post('/languages', 'API\LanguagesController@store');
    Route::delete('/languages/{id}', 'API\LanguagesController@destroy');
});


// API Authentication routes
Route::post('login', 'API\Auth\AuthController@login')->name('api.login');
Route::post('register', 'API\Auth\AuthController@register');
Route::post('logout', 'API\Auth\AuthController@logout');

// API users routes
Route::get('user', 'API\UsersController@user');

