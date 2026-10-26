<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes (tanpa autentikasi)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// Protected routes (memerlukan Bearer Token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user',   [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
