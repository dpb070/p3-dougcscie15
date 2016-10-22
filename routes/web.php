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

Route::get('/', 'LoremIpsumController@show')->name('loremipsum.show');
Route::get('loremipsum', 'LoremIpsumController@show')->name('loremipsum.show');
Route::get('usergen', 'UserGenController@show')->name('usergen.show');
Route::get('passwordgen', 'PasswordGenController@show')->name('passwordgen.show');
