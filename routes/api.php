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



Route::group(['prefix'=>'users/{user_id}'], function(){

// skills api routes:
    //list skills
    Route::get('/skills','SkillsController@index');
    //list single skill
    Route::get('/skills/{id}','SkillsController@show');
    //create new skill
    Route::post('skill','SkillsController@store');
    //update a skill
    Route::put('/skill','SkillsController@store');
    //delete skill
    Route::delete('skills/{id}','SkillsController@destroy');


// Hobbies api routes:
    //list skills
    Route::get('/hobbies','HobbiesController@index');
    //list single skill
    Route::get('/hobbies/{id}','HobbiesController@show');
    //create new skill
    Route::post('hobby','HobbiesController@store');
    //update a skill
    Route::put('/hobby','HobbiesController@store');
    //delete skill
    Route::delete('hobbies/{id}','HobbiesController@destroy');
});


