<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('post', 'PostController@index');

Route::get('post/{post}', 'PostController@show');

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'check_by_admin'], function () {
        Route::resource('user', 'UserController');
    });
    Route::group(['middleware' => 'editor_or_admin:post'], function () {
        Route::resource('post', 'PostController')->except(['index', 'store','show']);
    });

    Route::group(['middleware' => 'post_store'], function () {
        Route::post('post', 'PostController@store');
    });


    Route::group(['middleware' => 'own_or_admin:comment'], function () {
        Route::resource('comment', 'CommentController')->except(['index', 'store','show']);
    });
    Route::resource('comment', 'CommentController')->only(['index', 'store','show']);
});
