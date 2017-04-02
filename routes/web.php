<?php

Auth::routes();

Route::get('/', 'PublicController@index');
Route::get('/show/{article}', 'PublicController@show')->name('public.show');
Route::post('/comments', 'CommentsController@store');
Route::get('/home/{lang}', 'HomeController@changeLocal');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('/sections', 'SectionsController');
    Route::resource('/articles', 'ArticlesController');
    Route::delete('/comments/{id}', 'CommentsController@destroy')->name('comments.destroy');
    Route::resource('/users', 'UsersController');
    Route::resource('/tags', 'TagsController');
});
