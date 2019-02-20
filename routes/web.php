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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/group', 'GroupController@index')->middleware('checkAdmin');
Route::get('/group/{id}', 'GroupController@show')->name('group.show')->middleware('checkAdmin');


Route::get('/docent/', 'AdminController@index')->middleware('checkAdmin');
Route::get('/docent/registreer/student', 'AdminController@addStudent')->middleware('checkAdmin')->name('addStudent');

Route::get('/docent/cijfers/toevoegen', 'GradesController@showAdd')->middleware('checkAdmin');
Route::get('/docent/cijfer/{id}', 'GradesController@show')->middleware('checkAdmin');
Route::get('/docent/cijfers', 'GradesController@index')->middleware('checkAdmin');
Route::get('/docent/cijfer/verwijder/{id}', 'GradesController@destroy')->middleware('checkAdmin');
Route::get('/docent/cijfer/wijzig/{id}', 'GradesController@edit')->middleware('checkAdmin');
Route::post('/docent/cijfer/update/{id}', 'GradesController@update')->middleware('checkAdmin');

Route::get('/student/cijfers', 'StudentController@grades')->middleware('auth');

Route::resource('grades', 'GradesController')->middleware('checkAdmin');
Route::resource('docent', 'AdminController')->middleware('checkAdmin');
