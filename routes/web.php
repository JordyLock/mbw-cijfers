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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/docent/cijfers', 'GradesController@index');

Route::get('/student/cijfers', 'StudentController@grades')->middleware('auth');

Route::get('/docent/cijfers/toevoegen', 'GradesController@showAdd');
Route::resource('grades', 'GradesController');
