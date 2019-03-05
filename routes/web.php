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
	Route::get('/posts/restore/{id}',[
		'uses' => 'PostsController@restore',
		'as' => 'post.restore'
	]);
	Route::get('/posts/parDelete/{id}',[
		'uses' => 'PostsController@parmanentDelete',
		'as' => 'post.parDelete'
	]);
	Route::get('/post/delete/{id}',[
		'uses' => 'PostsController@destroy',
		'as' => 'post.delete'
	]);
	Route::get('/post/edit/{id}',[
		'uses' => 'PostsController@edit',
		'as' => 'post.edit'
	]);
	Route::post('/post/update/{id}',[
		'uses' => 'PostsController@update',
		'as' => 'post.update'
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
	Route::get('/tags',[
		'uses' => 'TagsController@index',
		'as' => 'tags'
	]);
	Route::get('/tag/create',[
		'uses' => 'TagsController@create',
		'as' => 'tag.create'
	]);
	Route::post('/tag/store',[
		'uses' => 'TagsController@store',
		'as' => 'tag.store'
	]);
	Route::get('/tag/edit/{id}',[
		'uses' => 'TagsController@edit',
		'as' => 'tag.edit'
	]);
	Route::post('/tag/update/{id}',[
		'uses' => 'TagsController@update',
		'as' => 'tag.update'
	]);
	Route::get('/tag/delete/{id}',[
		'uses' => 'TagsController@destroy',
		'as' => 'tag.delete'
	]);
	Route::get('/users',[
		'uses' => 'UsersController@index',
		'as' => 'users'
	]);
	Route::get('/users/create',[
		'uses' => 'UsersController@create',
		'as' => 'user.create'
	]);
	Route::post('/users/store',[
		'uses' => 'UsersController@store',
		'as' => 'user.store'
	]);
	Route::get('/users/admin_change/{id}',[
		'uses' => 'UsersController@admin_change',
		'as' => 'user.admin_change'
	]);
	Route::get('/user/profile',[
		'uses' => 'ProfilesController@index',
		'as' => 'user.profile'
	]);
	Route::post('/user/profile/update',[
		'uses' => 'ProfilesController@update',
		'as' => 'user.profile.update'
	]);
});


