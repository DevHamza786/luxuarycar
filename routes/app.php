<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;

Route::get('/dashboardBooking', [DashboardController::class, 'dashboardBooking'])->name('dashboard.booking');
Route::get('/all-bookings', [BookingController::class, 'allbookings'])->name('all.bookings');
Route::get('/all-drivers', [DriverController::class, 'alldriver'])->name('all.drivers');
Route::get('/all-users', [UserController::class, 'allusers'])->name('all.users');

