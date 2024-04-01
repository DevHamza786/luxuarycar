<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::post('login', [AuthenticatedSessionController::class, 'login'])->middleware('web');
Route::post('forget-password', [PasswordResetLinkController::class, 'store'])->middleware('web');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
