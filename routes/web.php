<?php

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
	// Laravel file manager
	Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
	Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');

	Route::group(['prefix' => 'admin'], function () {
		Route::resource('articles', 'ArticlesController');
	});	
});
