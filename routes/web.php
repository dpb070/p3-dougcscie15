<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// Lorem ipsum generator routes
Route::get('/', 'LoremIpsumController@index')->name('loremipsum.index');
Route::get('loremipsum', 'LoremIpsumController@index')->name('loremipsum.index');
Route::post('loremipsum', 'LoremIpsumController@store')->name('loremipsum.store');
// User generator routes
Route::get('usergen', 'UserGenController@index')->name('usergen.index');
Route::post('usergen', 'UserGenController@store')->name('usergen.store');
// Password generator routes
Route::get('passwordgen', 'PasswordGenController@index')->name('passwordgen.index');
Route::post('passwordgen', 'PasswordGenController@store')->name('passwordgen.store');
