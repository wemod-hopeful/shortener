<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BulkUrlController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Homepage');
})->name('home');

Route::resource('urls', UrlController::class)->only(['create', 'store', 'index']);
Route::resource('urls/bulk', BulkUrlController::class)->only(['create', 'store']);

// Handle redirecting from short links to original links
Route::get('go/{encodedId}', [UrlController::class, 'redirect'])->name('urls.redirect');

// Handle showing results of batch processing
Route::get('api/batch/{batchId}', [BatchController::class, 'show'])->name('api.batch.show');
Route::get('api/analytics/', [AnalyticsController::class, 'show'])->name('api.analytics.show');
