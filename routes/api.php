<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TagController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('restaurant')->group(function () {
    Route::get('/', [RestaurantController::class, 'index']);
    Route::post('/', [RestaurantController::class, 'store'])->name('restaurant.store')
        ->middleware('auth:api', 'admin');
    Route::delete('{id}', [RestaurantController::class, 'destroy'])->name('restaurant.delete')
        ->middleware('auth:api', 'admin');
    Route::get('{id}/review', [ReviewController::class, 'index'])->name('review.index');
    Route::post('{id}/review', [ReviewController::class, 'store'])->name('review.store')
        ->middleware('auth:api');
});

Route::prefix('user')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('user.index');
    Route::get('{id}', [ProfileController::class, 'show'])->name('user.show');
    Route::put('{id}', ProfileController::class, 'update')->name('user.update');
    Route::delete('{id}', ProfileController::class, 'delete')->name('user.delete');
});

Route::prefix('tag')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tag.index');
    Route::post('/', [TagController::class, 'store'])->name('tag.store');
    Route::post('{id}', [RestaurantController::class, 'storeTag'])->name('restaurant.tag');
    Route::delete('{id}', [TagController::class, 'destroy'])->name('tag.delete');
});
