<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ScategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/categories', [CategorieController::class, 'index']);
// Route::post('/categories', [CategorieController::class, 'store']);
// Route::get('/categories/{id}', [CategorieController::class, 'show']);
// Route::put('/categories/{id}', [CategorieController::class, 'update']);
// Route::delete('/categories/{id}', [CategorieController::class, 'destroy']);

Route::middleware('api')->group(function () {
    Route::resource("/categories", CategorieController::class);
    Route::resource("/scategories", ScategorieController::class);
    Route::resource("/articles", ArticleController::class);
});

Route::get('/listarticles/{idscat}', [ArticleController::class, 'showArticlesbySCAT']);
Route::get('/articles/art/pagination', [ArticleController::class, 'articlesPaginate']);
