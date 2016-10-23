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

Route::get('/', 'LoremIpsumController@index')->name('loremipsum.index');
Route::get('loremipsum', 'LoremIpsumController@index')->name('loremipsum.index');
Route::post('loremipsum', 'LoremIpsumController@store')->name('loremipsum.store');



Route::get('usergen', 'UserGenController@show')->name('usergen.show');
Route::get('passwordgen', 'PasswordGenController@show')->name('passwordgen.show');
