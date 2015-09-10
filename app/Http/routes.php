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

Route::get('/', function () {
    return view('welcome');
});

/*** Admin ***/
Route::get('login', 'Admin\UserController@login');
Route::controller('auth', 'Auth\AuthController');
Route::get('admin', 'Admin\PageController@index');
// node
Route::controller('admin/node', 'Admin\NodeController');
// article
Route::controller('admin/article', 'Admin\ArticleController');
// link
Route::controller('admin/link', 'Admin\LinkController');
// feedback
Route::controller('admin/feedback', 'Admin\FeedBackController');
// ad
Route::controller('admin/ad', 'Admin\AdController');
// user
Route::controller('admin/user', 'Admin\UserController');

/** resources **/
Route::controller('rs', 'ResourceController');