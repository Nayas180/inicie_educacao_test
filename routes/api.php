<?php

use App\Http\Controllers\{CommentsController, PostsController, UserController};
use Illuminate\Support\Facades\{Route};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => "/v1"], function () {
    Route::group(['prefix' => "/store"], function () {
        Route::post('/post', [PostsController::class, "store"]);
        Route::post('/comment', [CommentsController::class, "store"]);
    });
    
    Route::group(['prefix' => "/user", 'controller' => UserController::class], function () {
        Route::post('/store', "store");
        Route::get('/index', "index");
        Route::get('/show/{id_user}/', "show");
    });
});