<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfolioGalleryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TechnologyController;
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

Route::prefix('admin')->group(function () {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('tags', TagController::class);
    Route::apiResource('technologies', TechnologyController::class);
    Route::apiResource('portfolios', PortfolioController::class)->except('update');
    Route::post("portfolios/update", [PortfolioController::class, 'update']);
    Route::apiResource('portfolios/gallery', PortfolioGalleryController::class)->except(['update', 'index']);
    Route::get("portfolios/gallery/all/{id}", [PortfolioGalleryController::class, 'index'])->name('portfolios.gallery.index');
    Route::post("portfolios/gallery/update", [PortfolioGalleryController::class, 'update'])->name('portfolios.gallery.update');
});
