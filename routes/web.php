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

Route::get('/questions', 'QuestionController@index');
Route::get('/questions/search', 'QuestionController@search');
Route::get('/questions/index/searched', 'QuestionController@searched');
Route::get('/questions/create', 'QuestionController@create')->middleware('auth');
Route::get('/questions/{question}', 'QuestionController@show');
Route::get('/questions/{question}/user', 'QuestionController@detail')->middleware('auth');
Route::get('/questions/{question}/edit', 'QuestionController@edit')->middleware('auth');
Route::post('/questions', 'QuestionController@store')->middleware('auth');
Route::put('/questions/{question}', 'QuestionController@update')->middleware('auth');
Route::delete('/questions/{question}', 'QuestionController@delete')->middleware('auth');

Route::get('/answers/questions/{question}', 'AnswerController@create')->middleware('auth');
Route::post('/answers', 'AnswerController@store')->middleware('auth');

Route::get('/comments/answers/{answer}', 'CommentController@create')->middleware('auth');
Route::post('/comments', 'CommentController@store')->middleware('auth');

Route::get('/user', 'UserController@introduce')->middleware('auth');
Route::get('/user/questions', 'UserController@index')->middleware('auth');

Route::get('/category/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');

Route::get('/occupation/create', 'OccupationController@create');
Route::post('/occupations', 'OccupationController@store');

Route::get('/major/create', 'MajorController@create');
Route::post('/majors', 'MajorController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
