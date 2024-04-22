<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboardBooking', [DashboardController::class, 'dashboardBooking'])->name('dashboard.booking');
Route::get('/all-bookings', [BookingController::class, 'allbookings'])->name('all.bookings');

