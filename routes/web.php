<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Main page route
Route::get('/', [BookingController::class, 'index'])->name('home');
Route::get('/meeting-rooms', [BookingController::class, 'showAll'])
    ->name('meeting.rooms')
    ->middleware('auth');
Route::get('/rooms/meeting-room/{room}', [BookingController::class, 'show'])->name('meeting.room');

// Route::resource('booking', BookingController::class);
Route::get('/booking/{room}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/edit/{id}', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/booking/update/{id}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/delete/{id}', [BookingController::class, 'destroy'])->name('booking.delete');

//                                              AUTHENTICATION
//Register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
