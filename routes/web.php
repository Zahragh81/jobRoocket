<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompainController;
use App\Http\Controllers\UploadVideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('register', [RegisterController::class, 'register']);
Route::get('checkout', [CheckoutController::class, 'checkout']);
Route::get('/upload/video', [UploadVideoController::class, 'upload']);
Route::get('/sendCampaign', [CompainController::class, 'sendCampaign']);
