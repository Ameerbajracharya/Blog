<?php

// Route::get('/test', function(){
// 	return App\Profile::find(1)->user;
// });

Route::get('/', [
	'uses' => 'FrontEndController@index',
	'as' => 'index'
]);
Route::get('/results', [
	'uses' => 'FrontEndController@results',
	'as' => 'results.single'
]);


Route::get('/post/{slug}', [
	'uses' => 'FrontEndController@singlePost',
	'as' => 'post.single'
]);

Route::get('/category/{id}', [
	'uses' => 'FrontEndController@category',
	'as' => 'category.single'
]);

Route::get('/tag/{id}', [
	'uses' => 'FrontEndController@tag',
	'as' => 'tag.single'
]);

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::get('/post/create', [
		'uses' => 'PostsController@create',
		'as' => 'post.create'
	]);
	Route::post('/post/store',[
		'uses' => 'PostsController@store',
		'as'=> 'post.store'
	]);
	Route::get('/home', [
		'uses' => 'HomeController@index',
		'as' =>'home'
	]);
	Route::get('/category/create', [
		'uses' =>'CategoriesController@create',
		'as' => 'category.create'
	]);
	Route::post('/category/store', [
		'uses' =>'CategoriesController@store',
		'as' => 'category.store'
	]);
	Route::get('/categories', [
		'uses' =>'CategoriesController@index',
		'as' => 'categories'
	]);
	Route::get('/category/edit/{id}', [
		'uses' =>'CategoriesController@edit',
		'as' => 'category.edit'
	]);
	Route::get('/category/delete/{id}', [
		'uses' =>'CategoriesController@destroy',
		'as' => 'category.delete'
	]);
	Route::post('/category/update/{id}', [
		'uses' =>'CategoriesController@update',
		'as' => 'category.update'
	]);
	Route::get('/posts', [
		'uses' =>'PostsController@index',
		'as' => 'posts'
	]);
	Route::get('/post/delete/{id}', [
		'uses' =>'PostsController@destroy',
		'as' => 'post.delete'
	]);
	Route::get('/post/trashed', [
		'uses' =>'PostsController@trashed',
		'as' => 'post.trashed'
	]);
	Route::post('/post/update/{id}', [
		'uses' =>'PostsController@update',
		'as' => 'post.update'
	]);
	Route::get('/post/kill/{id}', [
		'uses' =>'PostsController@kill',
		'as' => 'post.kill'
	]);
	Route::get('/post/restore/{id}', [
		'uses' =>'PostsController@restore',
		'as' => 'post.restore'
	]);
	Route::get('/post/edit/{id}', [
		'uses' =>'PostsController@edit',
		'as' => 'post.edit'
	]);
	Route::get('/tags', [
		'uses' => 'TagsController@index',
		'as' => 'tags'
	]);
	Route::get('/tag/edit/{id}', [
		'uses' => 'TagsController@edit',
		'as' => 'tag.edit'
	]);
	Route::get('/tag/delete/{id}', [
		'uses' => 'TagsController@destroy',
		'as' => 'tag.delete'
	]);
	Route::get('/tag/create', [
		'uses' => 'TagsController@create',
		'as' => 'tag.create'
	]);
	Route::post('/tag/store', [
		'uses' => 'TagsController@store',
		'as' => 'tag.store'
	]);
	Route::post('/tag/update/{id}', [
		'uses' => 'TagsController@update',
		'as' => 'tag.update'
	]);
	Route::get('/users', [
		'uses' => 'UsersController@index',
		'as' => 'users'
	]);
	Route::get('/users/create', [
		'uses' => 'UsersController@create',
		'as' => 'user.create'
	]);
	Route::post('/users/store', [
		'uses' => 'UsersController@store',
		'as' => 'user.store'
	]);
	Route::get('/users/admin/{id}', [
		'uses' => 'UsersController@admin',
		'as' => 'user.admin'
	]);
	Route::get('/users/not-admin/{id}', [
		'uses' => 'UsersController@not_admin',
		'as' => 'user.not.admin'
	]);
	Route::get('/users/profile', [
		'uses' => 'ProfileController@index',
		'as' => 'user.profile'
	]);
	Route::post('/users/profile/update', [
		'uses' => 'ProfileController@update',
		'as' => 'user.profile.update'
	]);
	Route::get('/users/delete/{id}', [
		'uses' => 'UsersController@destroy',
		'as' => 'user.delete'
	]);
	Route::get('/settings', [
		'uses' => 'SettingsController@index',
		'as' => 'settings'
	]);
	Route::get('/settings', [
		'uses' => 'SettingsController@index',
		'as' => 'settings'
	]);
	Route::post('/settings/update', [
		'uses' => 'SettingsController@update',
		'as' => 'settings.update'
	]);
});
