<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication Routes
Route::get('auth/login', ['as' => 'auth.loginForm', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration Routes
Route::get('auth/register', ['as' => 'auth.registerForm', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@postRegister']);

// Password Reset Routes
Route::post('password/email', ['as' => 'sendResetLink', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token?}', ['as' => 'resetPwdForm', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'resetPwd', 'uses' => 'Auth\PasswordController@reset']);

// Pages Routes
Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', ['as' => 'contact.get', 'uses' => 'PagesController@getContact']);
Route::post('contact', ['as' => 'contact.post', 'uses' => 'PagesController@postContact']);

// Blog Routes
Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);
// -> [\w\d\-\_]+  => chi nhan cac ky tu alphabet + number + - + _
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

// Posts Routes
Route::resource('posts', 'PostController');
// Categories Routes
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
// Tags Routes
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Comments Routes
Route::post('comments/{post_id}', ['as' => 'comments.store', 'uses' => 'CommentsController@store']);
Route::get('comments/{id}/edit', ['as' => 'comments.edit', 'uses' => 'CommentsController@edit']);
Route::put('comments/{id}', ['as' => 'comments.update', 'uses' => 'CommentsController@update']);
Route::delete('comments/{id}', ['as' => 'comments.destroy', 'uses' => 'CommentsController@destroy']);
Route::get('comments/{id}/delete', ['as' => 'comments.delete', 'uses' => 'CommentsController@delete']);