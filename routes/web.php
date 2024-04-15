<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;

Route::get('/', function () { return view('home.index');})->name('home');
Route::get('/about', function () { return view('home.about');});
Route::get('/blog', function () { return view('home.blog');});
Route::get('/contact', function () { return view('home.contact');});
Route::get('/faq', function () { return view('home.faq');});
Route::get('/how-we-work', function () { return view('home.how-we-work');});
Route::get('/single-blog', function () { return view('home.single-blog');});
Route::get('/services', function () { return view('home.services');});
Route::get('/refund-policy', function () { return view('home.refund-policy');});
Route::get('/single-service', function () { return view('home.single-service');});
Route::get('/vehicle', function () { return view('home.vehicle');});
Route::get('/privacy-policy', function () { return view('home.privacy-policy');});

Route::post('/booking', [HomeController::class, 'store'])->name('booking.store');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/dashboard/users/{id}', [DashboardController::class, 'softDelete'])->name('users.softdelete');

    Route::get('/all-bookings', [BookingController::class, 'index'])->name('all.bookings');
    Route::post('/assgin-driver', [BookingController::class, 'assginDriver'])->name('assgin-driver');
    Route::delete('/dashboard/booking/{id}', [BookingController::class, 'softDelete'])->name('booking.softdelete');

    Route::get('/all-drivers', [DriverController::class, 'index'])->name('all.drivers');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
