<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\PaymentSettingController;

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


Route::get('/verify-otp', [OTPController::class, 'showVerifyForm'])->name('verify-otp');
Route::post('/verify-otp', [OTPController::class, 'verifyOTP'])->name('verify-otp');

Route::middleware('auth')->group(function () {
    // check driver profile setup
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('check.driver.profile.setup');
    Route::delete('/dashboard/users/{id}', [DashboardController::class, 'softDelete'])->name('users.softdelete');

    // Booking
    Route::post('/booking/end', [BookingController::class, 'endRide'])->name('booking.end');
    Route::post('/assgin-driver', [BookingController::class, 'assginDriver'])->name('assgin-driver');
    Route::post('/booking-status', [BookingController::class, 'ridestatus'])->name('booking-status');
    Route::get('/booking/payment', [BookingController::class, 'showPaymentPage'])->name('booking.payment');
    Route::get('/fetch-latest-data/{id}', [BookingController::class, 'fetchLatestData'])->name('fetchLatestData');
    Route::delete('/dashboard/booking/{id}', [BookingController::class, 'softDelete'])->name('booking.softdelete');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings')->middleware('check.driver.profile.setup');
    Route::get('/map/{id}', [BookingController::class, 'showMap'])->name('map.show')->middleware('check.driver.profile.setup');
    Route::post('/booking/{id}/process-payment', [BookingController::class, 'processPayment'])->name('booking.processPayment');


    // Driver
    Route::get('/drivers', [DriverController::class, 'index'])->name('drivers');
    Route::get('/profile-setup', [DriverController::class, 'profileSetup'])->name('driver.profile');
    Route::post('/driver-status', [DriverController::class, 'driverStatus'])->name('driver.status');
    Route::post('/profile-update', [DriverController::class, 'profileUpdate'])->name('driver.update');
    Route::get('/drivers-delete/{id}', [DriverController::class, 'softDelete'])->name('driver.delete');
    Route::get('/driver-profile/{id}', [DriverController::class, 'getdriverData'])->name('driver.data');

    // Payment Setting
    Route::get('/payment-setting',[PaymentSettingController::class,'index'])->name('payment.setting');
    Route::post('/payment-store',[PaymentSettingController::class,'store'])->name('payment.store');

    // Payment
    Route::get('/payment',[PaymentController::class,'index'])->name('payment.index');
    Route::post('/charge',[PaymentController::class,'charge'])->name('payment.charge');

    // User
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/user-status', [UserController::class, 'userStatus'])->name('user.status');
    Route::get('/user-delete/{id}', [UserController::class, 'softDelete'])->name('user.delete');


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/updatepassword', [HomeController::class, 'passwordUpdate'])->name('passwordUpdate');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
