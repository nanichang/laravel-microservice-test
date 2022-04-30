<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles', 'index');
        Route::get('/articles/{article_id}', 'findById');
        Route::get('/articles/{article_id}/comment', 'getArticleWithComments');
        Route::get('/articles/{article_id}/like', 'likeArticle');
        Route::get('/articles/{article_id}/view', 'viewArticle');
    });
});