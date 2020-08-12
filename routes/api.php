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
    // toggle visibility
    Route::post('/skills/toggle-visibility', 'API\SkillsController@toggleVisibility');
    // Update order
    Route::post('/skills/update-order', 'API\SkillsController@updateSkillsOrder');
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
    //update order:
    Route::post('/hobbies/update-order', 'API\HobbiesController@updateHobbiesOrder');
    //update a skill
    Route::put('/hobbies', 'API\HobbiesController@store');
    //delete skill
    Route::delete('hobbies/{id}', 'API\HobbiesController@destroy');



// Themes api routes:
    Route::get('/themes-list', 'API\ThemesController@themesList');
    Route::get('/available-themes', 'API\ThemesController@availableThemesCodes');
    Route::get('/current-theme', 'API\ThemesController@show');
    Route::post('/themes', 'API\ThemesController@store');
    Route::put('/themes', 'API\ThemesController@store');
    Route::delete('/themes/{id}', 'API\ThemesController@destroy');


// Education api routes:
    //list education
    Route::get('/education', 'API\EducationController@index');
    //list single education
    Route::get('/education/{id}', 'API\EducationController@show');
    //create new education
    Route::post('/education', 'API\EducationController@store');
    //create many educations
    Route::post('/education-many', 'API\EducationController@storeMany');
    //update order:
    Route::post('/education/update-order', 'API\EducationController@updateEducationOrder');
    //update a education
    Route::put('/education', 'API\EducationController@store');
    //delete education
    Route::delete('education/{id}', 'API\EducationController@destroy');


// Builder URL api routes:
    Route::get('/builder-url', 'API\EducationController@index');
    Route::get('/builder-url/{id}', 'API\EducationController@show');
    Route::post('/builder-url', 'API\EducationController@store');
    Route::put('/builder-url', 'API\EducationController@store');
    Route::delete('builder-url/{id}', 'API\EducationController@destroy');



// WorkEx api routes:

    // tabs
    Route::post('/tabs/update-order', 'API\TabsController@updateTabsOrder');
    Route::put('/tabs', 'API\TabsController@toggleVisibility');

    //list workExperience
    Route::get('/work-experience', 'API\WorkExController@index');
    //list single workExperience
    Route::get('/work-experience/{id}', 'API\WorkExController@show');
    //create new workExperience
    Route::post('/work-experience', 'API\WorkExController@store');
    //create many workExperience
    Route::post('/work-experience-many', 'API\WorkExController@storeMany');
    //update order:
    Route::post('/work-experience/update-order', 'API\WorkExController@updateWorksOrder');
    //update a workExperience
    Route::put('/work-experience', 'API\WorkExController@store');
    //delete workExperience
    Route::delete('work-experience/{id}', 'API\WorkExController@destroy');

// Personal info api routes:
    Route::get('/personal-info', 'API\PersonalInfoController@index');
    Route::put('/personal-info', 'API\PersonalInfoController@store');
    Route::put('/personal-info/single-field', 'API\PersonalInfoController@updateSingleField');

//  Account user data:
    Route::post('/account/submit', 'API\UsersController@editAccountData')->name('account.edit');
// update activity
    Route::post('/update-last-activity', 'API\UsersController@updateLastActivity')->name('account.validate');

//  update user theme :
    Route::put('/update-theme', 'API\UsersController@updateUserTheme');

// Links api routes:
    Route::get('/links', 'API\LinksController@index');
    Route::get('/links/{category}', 'API\LinksController@getLinksByCategory');
    Route::get('/links/{id}', 'API\LinksController@show');
    Route::post('/links', 'API\LinksController@store');
    Route::post('/links/update-order', 'API\LinksController@updateLinksOrder');
    Route::put('/links', 'API\LinksController@store');
    Route::delete('/links/{id}', 'API\LinksController@destroy');

// Languages api routes:
    Route::get('/languages', 'API\LanguagesController@index');
    Route::get('/languages-list', 'API\LanguagesController@languagesList');
    Route::post('/languages', 'API\LanguagesController@store');
    Route::post('/languages-many', 'API\LanguagesController@storeMany');
    Route::post('/languages-sync', 'API\LanguagesController@syncLanguages');
    Route::delete('/languages/{id}/{user_id}', 'API\LanguagesController@destroy');

// Projects api routes:
    Route::get('/projects', 'API\ProjectsController@index');
    Route::get('/projects/{id}', 'API\ProjectsController@show');
    Route::post('/projects', 'API\ProjectsController@store');
    Route::post('/projects/many', 'API\ProjectsController@storeMany');
    Route::post('/projects/update-order', 'API\ProjectsController@updateProjectsOrder');
    Route::put('/projects', 'API\ProjectsController@store');
    Route::delete('/projects/{id}', 'API\ProjectsController@destroy');
    Route::delete('/projects/images/{id}', 'API\ProjectsController@destroyProjectImage');

// Achievements api routes:
    Route::get('/achievements', 'API\AchievementsController@index');
    Route::get('/achievements/{id}', 'API\AchievementsController@show');
    Route::post('/achievements', 'API\AchievementsController@store');
    Route::post('/achievements/update-order', 'API\AchievementsController@updateAchievementsOrder');
    Route::put('/achievements', 'API\AchievementsController@store');
    Route::delete('/achievements/{id}', 'API\AchievementsController@destroy');


// Media api routes:
    Route::get('/media', 'API\MediaController@index');
    Route::get('/media/{id}', 'API\MediaController@show');
    Route::post('/media', 'API\MediaController@store');
    Route::post('/media/update-order', 'API\MediaController@updateMediaOrder');
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
    Route::post('/imports/update-order', 'API\ImportsController@updateImportsOrder');
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
    Route::post('/give-test-permission', 'API\Admin\UsersController@giveTestPermission');
    Route::delete('delete-user/{id}', 'API\Admin\UsersController@deleteUser');

    // Promocodes routes:
    Route::get('promocodes', 'API\Admin\PromocodesController@index');
    Route::post('promocode', 'API\Admin\PromocodesController@store');
    Route::delete('delete-promocode/{id}', 'API\Admin\PromocodesController@destroy');
});


// API users routes
Route::get('user', 'API\UsersController@user');

