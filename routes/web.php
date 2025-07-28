<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;

// Trang chính
Route::get('/', [TripController::class, 'index'])->name('trip.index');

// API routes cho form submission
Route::post('/api/confirm', [TripController::class, 'confirm'])->name('trip.confirm');
Route::post('/api/suggest', [TripController::class, 'suggest'])->name('trip.suggest');

// API để lấy danh sách (nếu cần)
Route::get('/api/participants', [TripController::class, 'participants'])->name('trip.participants');
