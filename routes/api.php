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
});


// API Authentication routes
Route::post('login', 'API\AuthController@login')->name('api.login');
Route::post('register', 'API\AuthController@register');

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('user', 'API\AuthController@user');
    Route::post('logout', 'API\AuthController@logout');

});

