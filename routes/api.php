<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name("api.")->group(function () {
    Route::post('auth', [AuthController::class, 'auth'])->name('auth');
});
