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

//Route::get('/', );  
Route::resource('/', 'SurveyController');
Auth::routes();
Route::get('home', 'SurveyController@home')->name('home');

Route::get('survey', 'SurveyController@survey')->name('survey');
Route::get('storeSurvey', 'SurveyController@storeSurvey')->name('storeSurvey');
Route::get('surveyStep2/{id}', 'SurveyController@surveyStep2')->name('surveyStep2');
Route::get('surveyStep2Edit/{id}', 'SurveyController@surveyStep2Edit')->name('surveyStep2Edit');
Route::post('createSurvey', 'SurveyController@createSurvey')->name('createSurvey');
Route::post('createAdvancedSurvey', 'SurveyController@createAdvancedSurvey')->name('createAdvancedSurvey');
Route::get('/surveyEdit/{id}', 'SurveyController@surveyEdit')->name('surveyEdit');
Route::get('/surveyFormView/{id}', 'SurveyController@surveyFormView')->name('surveyFormView');
Route::get('/deleteSurvey/{id}', 'SurveyController@deleteSurvey')->name('deleteSurvey');
Route::post('updateSurvey','SurveyController@updateSurvey')->name('updateSurvey');
Route::post('updateSurveyStep2','SurveyController@updateSurveyStep2')->name('updateSurveyStep2');
//quiz routes ---------------------------------------------------------------------------------------------------------
Route::get('quizListing', 'QuizController@quizListing')->name('quizListing');
Route::get('createQuiz', 'QuizController@createQuiz')->name('createQuiz');
Route::post('storeQuiz', 'QuizController@storeQuiz')->name('storeQuiz');
Route::get('/deleteQuiz/{id}', 'QuizController@deleteQuiz')->name('deleteQuiz');
Route::get('/editQuiz/{id}', 'QuizController@editQuiz')->name('editQuiz');
Route::post('quiz_multidelete', 'QuizController@quiz_multidelete')->name('quiz_multidelete');
Route::post('updateQuiz', 'QuizController@updateQuiz')->name('updateQuiz');


