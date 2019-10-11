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

Route::get('/', 'HomeController@index');

//Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/portfolio', 'PublicProjectsController@index')->name('public.projects');

Route::get('/posts', 'PublicPostsController@index')->name('public.posts');
Route::get('/posts/{postSlug}', 'PublicPostsController@show')->name('public.post.show');
Route::post('/subscribe', 'SubscribersController@store')->name('public.subscriber.store');
Route::get('/unsubscribe', 'SubscribersController@destroy')->name('public.subscriber.destroy');
Route::get('/subscribe-confirmation', 'SubscribersController@update')->name('public.subscriber.update');

Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::group(["prefix" => 'categories'], function () {
        Route::get('/', 'CategoriesController@index')->name('category.index');
        Route::post('/', 'CategoriesController@store')->name('category.store');
        Route::get('/create', 'CategoriesController@create')->name('category.create');
        Route::get('/{id}/edit', 'CategoriesController@edit')->name('category.edit');
        Route::patch('/{id}', 'CategoriesController@update')->name('category.update');
        Route::get('/{id}', 'CategoriesController@show')->name('category.show');
        Route::delete('/{id}', 'CategoriesController@destroy')->name('category.delete');
    });

    Route::group(["prefix" => 'tags'], function () {
        Route::get('/', 'TagsController@index')->name('tag.index');
        Route::post('/', 'TagsController@store')->name('tag.store');
        Route::get('/create', 'TagsController@create')->name('tag.create');
        Route::get('/{id}/edit', 'TagsController@edit')->name('tag.edit');
        Route::patch('/{id}', 'TagsController@update')->name('tag.update');
        Route::get('/{id}', 'TagsController@show')->name('tag.show');
        Route::delete('/{id}', 'TagsController@destroy')->name('tag.delete');
    });


    Route::group(["prefix" => 'posts'], function () {
        Route::get('/', 'PostsController@index')->name('post.index');
        Route::post('/', 'PostsController@store')->name('post.store');
        Route::get('/create', 'PostsController@create')->name('post.create');
        Route::get('/{id}/edit', 'PostsController@edit')->name('post.edit');
        Route::patch('/{id}', 'PostsController@update')->name('post.update');
        Route::get('/{id}', 'PostsController@show')->name('post.show');
        Route::delete('/{id}', 'PostsController@destroy')->name('post.delete');

        Route::post('/post-upload-image', 'PostImageController@store')->name('image.store');
    });

    Route::group(["prefix" => 'projects'], function () {
        Route::get('/', 'ProjectsController@index')->name('project.index');
        Route::post('/', 'ProjectsController@store')->name('project.store');
        Route::get('/create', 'ProjectsController@create')->name('project.create');
        Route::get('/{id}/edit', 'ProjectsController@edit')->name('project.edit');
        Route::patch('/{id}', 'ProjectsController@update')->name('project.update');
        Route::get('/{id}', 'ProjectsController@show')->name('project.show');
        Route::delete('/{id}', 'ProjectsController@destroy')->name('project.delete');
        Route::delete('/project-image-delete/{projectImage}', 'ProjectImageController@destroy')->name('projectImage.delete');
    });

    Route::group(["prefix" => 'subscribers'], function () {
        Route::get('/', 'SubscribersController@index')->name('subscriber.index');
    });
});
