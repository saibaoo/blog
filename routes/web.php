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

//User Routes
Route::group(['namespace' => 'User'], function(){
	Route::get('/','HomeController@index')->name('index');
	Route::get('post/{post}','PostController@post')->name('post');
	Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
	Route::get('post/category/{category}','HomeController@category')->name('category');
	Route::post('getPosts','PostController@getAllPosts');
	Route::post('saveLike','PostController@saveLike');
});


//Admin Routes
Route::group(['namespace'=> 'Admin'], function(){
	Route::get('admin/home', 'HomeController@home')->name('admin.home');

	//User Routes
	Route::resource('admin/user','UserController');

	//Role Routes
	Route::resource('admin/role','RoleController');

	//Permission Routes
	Route::resource('admin/permission','PermissionController');

	//Post Routes
	Route::resource('admin/post','PostController');

	//Tag Routes
	Route::resource('admin/tag','TagController');

	//Category Routes
	Route::resource('admin/category','CategoryController');

	//Admin auth
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login', 'Auth\LoginController@login');

});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
