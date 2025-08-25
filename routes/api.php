<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [UserController::class, 'me'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/home', [UserController::class, 'home']);
    Route::post('/search-ip', [UserController::class, 'searchIp']);
    Route::get('/clear-search', [UserController::class, 'clearSearch']);
    
   
    Route::get('/history', [UserController::class, 'history']);
    Route::get('/history/{id}', [UserController::class, 'showHistory']);
    Route::post('/history-delete', [UserController::class, 'deleteHistories']);
});
