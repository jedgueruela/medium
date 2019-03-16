<?php

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index');
Route::resource('articles', 'ArticlesController');

Route::group(['middleware' => 'auth'], function () {
	// Laravel file manager
	Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
	Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
});
