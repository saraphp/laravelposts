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
Route::get('/users', 'UsersController@index');
Route::get('/users-with-posts', 'UsersController@getUsersWithPosts');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/user/{id}', 'PostsController@getPostsByUserId');
Route::get('/posts-with-user', 'PostsController@getPostsWithUser');
Route::get('/comments', 'CommentsController@index');