<?php

use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\HotelSettingsController;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\authentications\AuthenticatedSessionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\user\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;


// Main Page Route
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/rooms', [IndexController::class, 'rooms'])->name('rooms');
Route::get('/services', [IndexController::class, 'services'])->name('services');
Route::get('/hotels', [IndexController::class, 'hotels'])->name('hotels');



Route::get('/rooms/availability', [IndexController::class, 'showAvailability'])->name('rooms.availability');
// Show booking form (GET)
Route::get('/bookings/create', [BookingController::class, 'create'])
  ->name('bookings.create');

// Process booking (POST)
Route::post('/bookings', [BookingController::class, 'store'])
  ->name('bookings.store');

// Booking confirmation (GET)
Route::get('/bookings/{reservation}/confirmation', [BookingController::class, 'confirmation'])
  ->name('bookings.confirmation');

Route::get('/my-space', 'App\Http\Controllers\IndexController@redirectBasedOnRole')->name('my-space');



// authentication
// Login Routes
Route::get('/auth/login', [LoginBasic::class, 'index'])->name('login');
Route::post('/auth/login', [LoginBasic::class, 'login'])->name('login.post');
Route::post('/auth/logout', [LoginBasic::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {

  Route::prefix('account')->group(function () {
    // Profile Routes
    Route::put('/profile', [UserProfileController::class, 'update'])->name('account.profile.update');
    Route::put('/profile/password', [UserProfileController::class, 'updatePassword'])->name('account.profile.password');
    Route::post('/profile/picture', [UserProfileController::class, 'updateProfilePicture'])->name('account.profile.picture');

    // User account route
    Route::get('/', [AccountController::class, 'index'])->name('account');
    // Reservations routes

    // User reservations
    Route::get('reservations', [UserReservationController::class, 'index'])->name('reservations.index');
    Route::get('reservations/{reservation}', [UserReservationController::class, 'show'])->name('account.reservations.show');
    Route::post('reservations/{reservation}/review', [UserReservationController::class, 'storeReview'])
      ->name('account.reservations.review.store');



    // User reviews routes
    Route::get('reviews', [UserReviewController::class, 'index'])->name('account.reviews.index');
    Route::get('reviews/{review}/edit', [UserReviewController::class, 'edit'])->name('account.reviews.edit');
    Route::put('reviews/{review}', [UserReviewController::class, 'update'])->name('account.reviews.update');
    Route::delete('reviews/{review}', [UserReviewController::class, 'destroy'])->name('account.reviews.destroy');
  });



  // Admin routes
  Route::middleware('can:admin')->prefix('admin')->group(function () {
    Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.picture');
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');


    // users routes
    Route::prefix('users')->group(function () {
      Route::get('/list', [UserController::class, 'index'])->name('users.list');
      Route::get('/add', [UserController::class, 'create'])->name('users.add');
      Route::post('/store', [UserController::class, 'store'])->name('users.store');
      Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
      Route::put('/update/{user}', [UserController::class, 'update'])->name('users.update');
      Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('users.delete');
    });

    // hotels routes
    Route::prefix('hotels')->group(function () {
      Route::get('/list', [HotelController::class, 'index'])->name('hotels.list');
      Route::get('/add', [HotelController::class, 'create'])->name('hotels.add');
      Route::post('/store', [HotelController::class, 'store'])->name('hotels.store');
      Route::get('/edit/{hotel}', [HotelController::class, 'edit'])->name('hotels.edit');
      Route::put('/update/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
      Route::delete('/delete/{hotel}', [HotelController::class, 'destroy'])->name('hotels.delete');
      Route::post('/set-featured-image/{image}', [HotelController::class, 'setFeaturedImage'])->name('hotels.set-featured-image');
      Route::delete('/delete-image/{image}', [HotelController::class, 'deleteImage'])->name('hotels.delete-image');
    });


    // room types routes
    Route::prefix('room-types')->group(function () {
      Route::get('/list', [RoomTypeController::class, 'index'])->name('room-types.list');
      Route::get('/add', [RoomTypeController::class, 'create'])->name('room-types.add');
      Route::post('/store', [RoomTypeController::class, 'store'])->name('room-types.store');
      Route::get('/edit/{roomType}', [RoomTypeController::class, 'edit'])->name('room-types.edit');
      Route::put('/update/{roomType}', [RoomTypeController::class, 'update'])->name('room-types.update');
      Route::delete('/delete/{roomType}', [RoomTypeController::class, 'destroy'])->name('room-types.delete');
    });

    // Amenities routes
    Route::prefix('amenities')->group(function () {
      Route::get('/list', [AmenityController::class, 'index'])->name('amenities.list');
      Route::get('/add', [AmenityController::class, 'create'])->name('amenities.add');
      Route::post('/store', [AmenityController::class, 'store'])->name('amenities.store');
      Route::get('/edit/{amenity}', [AmenityController::class, 'edit'])->name('amenities.edit');
      Route::put('/update/{amenity}', [AmenityController::class, 'update'])->name('amenities.update');
      Route::delete('/delete/{amenity}', [AmenityController::class, 'destroy'])->name('amenities.delete');
    });


    // Rooms routes
    Route::prefix('rooms')->group(function () {
      Route::get('/list', [RoomController::class, 'index'])->name('rooms.list');
      Route::get('/add', [RoomController::class, 'create'])->name('rooms.add');
      Route::post('/store', [RoomController::class, 'store'])->name('rooms.store');
      Route::get('/edit/{room}', [RoomController::class, 'edit'])->name('rooms.edit');
      Route::put('/update/{room}', [RoomController::class, 'update'])->name('rooms.update');
      Route::delete('/delete/{room}', [RoomController::class, 'destroy'])->name('rooms.delete');
      Route::post('/set-featured-image/{image}', [RoomController::class, 'setFeaturedImage'])->name('rooms.set-featured-image');
      Route::delete('/delete-image/{image}', [RoomController::class, 'deleteImage'])->name('rooms.delete-image');
    });


    // Admin reservations routes
    Route::get('/reservations/list', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/reservations/{reservation}', [AdminReservationController::class, 'show'])->name('admin.reservations.show');


    // Admin reviews routes
    Route::get('/reviews/list', [AdminReviewController::class, 'index'])->name('admin.reviews.index');
    Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');

    Route::get('/account/settings', [HotelSettingsController::class, 'index'])->name('admin.account.settings');
  });
});

Route::get('/auth/register', [RegisterBasic::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterBasic::class, 'register'])->name('register.post');

Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password');

// Authentication routes
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
  ->name('logout');



