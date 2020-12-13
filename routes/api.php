<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
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

Route::get('restaurant', [RestaurantController::class, 'index']);
Route::post('restaurant', [RestaurantController::class, 'store']);
Route::get('review/{id}', [ReviewController::class, 'index'])->name('review.index');
Route::post('review/{id}', [ReviewController::class, 'store'])->name('review.store')->middleware('auth:api');
