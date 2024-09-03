<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
//    'auth:sanctum',
    config('jetstream.auth_session'),
//    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::post('/otp', [\App\Http\Controllers\OtpController::class, 'otp'])->name('home.otp');
Route::post('/verify-otp', [\App\Http\Controllers\OtpController::class, 'verify'])->name('verify.otp');
