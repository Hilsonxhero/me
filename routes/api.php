<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EditorUploadController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfolioGalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Api\ArticleController as ApiArticleController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\MessageController as ApiMessageController;
use App\Http\Controllers\Api\PortfolioController as ApiPortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('application')->group(function () {


    Route::prefix('auth')->group(function () {
        Route::post('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])
            ->middleware('guest');

        Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])
            ->middleware('guest');

        Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });


    // general
    Route::get('general', [GeneralController::class, 'index']);


    // portfolios
    Route::get('portfolios', [ApiPortfolioController::class, 'index']);

    // portfolios show
    Route::get('portfolios/{id}', [ApiPortfolioController::class, 'show']);

    // portfolios all
    Route::get('portfolios/all/index', [ApiPortfolioController::class, 'all']);




    // articles
    Route::get('articles', [ApiArticleController::class, 'index']);

    // articles all
    Route::get('articles/all/index', [ApiArticleController::class, 'all']);

    // articles sample
    Route::get('articles/sample', [ApiArticleController::class, 'sample']);


    // articles show
    Route::get('articles/{id}', [ApiArticleController::class, 'show']);

    // message
    Route::post('message/user', [ApiMessageController::class, 'store']);
});

Route::prefix('admin')->middleware(['auth:sanctum', 'auth.admin'])->group(function () {

    // categories
    Route::apiResource('categories', CategoryController::class);

    // tags
    Route::apiResource('tags', TagController::class);

    // technologies
    Route::apiResource('technologies', TechnologyController::class);

    // articles
    Route::apiResource('articles', ArticleController::class)->except('update');
    Route::post("articles/update", [ArticleController::class, 'update']);

    // portfolios
    Route::apiResource('portfolios', PortfolioController::class)->except('update');
    Route::post("portfolios/update", [PortfolioController::class, 'update']);
    Route::apiResource('portfolios/gallery', PortfolioGalleryController::class)->except(['update', 'index']);
    Route::get("portfolios/gallery/all/{id}", [PortfolioGalleryController::class, 'index'])->name('portfolios.gallery.index');
    Route::post("portfolios/gallery/update", [PortfolioGalleryController::class, 'update'])->name('portfolios.gallery.update');

    // messages
    Route::apiResource('messages', MessageController::class)->except('update');
    Route::post("messages/update", [MessageController::class, 'update']);


    // setting
    Route::get("setting", [SettingController::class, 'index']);
    Route::post("setting/update", [SettingController::class, 'update']);

    // editor upload
    Route::post('upload/editor', [EditorUploadController::class, 'upload']);
});
