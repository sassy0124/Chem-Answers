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
Route::get('/questions/create', 'QuestionController@create');
Route::get('/questions/{question}', 'QuestionController@show');
Route::get('/questions/{question}/user', 'QuestionController@detail');
Route::get('/questions/{question}/edit', 'QuestionController@edit');
Route::post('/questions', 'QuestionController@store');
Route::put('/questions/{question}', 'QuestionController@update');
Route::delete('/questions/{question}', 'QuestionController@delete');

Route::get('/answers/questions/{question}', 'AnswerController@create');
Route::post('/answers', 'AnswerController@store');

Route::get('/comments/answers/{answer}', 'CommentController@create');
Route::post('/comments', 'CommentController@store');

Route::get('/user', 'UserController@introduce');
Route::get('/user/questions', 'UserController@index');

Route::get('/category/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');

Route::get('/occupation/create', 'OccupationController@create');
Route::post('/occupations', 'OccupationController@store');

Route::get('/major/create', 'MajorController@create');
Route::post('/majors', 'MajorController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
