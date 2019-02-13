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


Route::get('/docent/cijfers', 'GradesController@index')->middleware('role:admin');
Route::get('/docent/cijfers/{id}', 'GradesController@show')->name('grades.show')->middleware('checkRole:admin');
Route::get('/docent/cijfers/add', 'GradesController@add');
Route::get('/group', 'GroupController@index');
Route::get('/group/{id}', 'GroupController@show')->name('group.show');
