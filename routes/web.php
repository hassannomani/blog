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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/post/rendercreate',[
		'uses' => 'PostsController@renderCreate',
		'as' => 'post.rendercreate'
	]);

	Route::post('/post/create',[
		'uses' => 'PostsController@create',
		'as' => 'post.create'
	]);
	Route::get('/posts',[
		'uses' => 'PostsController@index',
		'as' => 'post.index'
	]);
	Route::get('/posts/trashed',[
		'uses' => 'PostsController@trashed',
		'as' => 'post.trashed'
	]);
	Route::get('/posts/parDelete/{id}',[
		'uses' => 'PostsController@parmanentDelete',
		'as' => 'post.parDelete'
	]);
	Route::get('/post/delete/{id}',[
		'uses' => 'PostsController@destroy',
		'as' => 'post.delete'
	]);
	Route::get('/category/create',[
		'uses' => 'CategoriesController@create',
		'as' => 'category.create'
	]);
	Route::post('/category/store',[
		'uses' => 'CategoriesController@store',
		'as' => 'category.store'
	]);
	Route::get('/categories',[
		'uses' => 'CategoriesController@index',
		'as' => 'category.index'
	]);
	Route::get('/categories/edit/{id}',[
		'uses' => 'CategoriesController@edit',
		'as' => 'category.edit'
	]);
	Route::get('/categories/delete/{id}',[
		'uses' => 'CategoriesController@destroy',
		'as' => 'category.delete'
	]);
	Route::post('/category/update/{id}',[
		'uses' => 'CategoriesController@update',
		'as' => 'category.update'
	]);

});


