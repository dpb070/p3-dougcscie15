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

Route::get('/', function() {
    return 'at root...';
});
Route::get('loremipsum', 'LoremIpsumController@show')->name('loremipsum.show');
Route::get('/books/{title}', 'BookController@show')->name('books.show');
