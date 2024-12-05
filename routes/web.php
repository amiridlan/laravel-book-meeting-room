<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Main page route
Route::get('/', [BookingController::class, 'index'])->name('home');
Route::get('/meeting-rooms', [BookingController::class, 'showAll'])->name('meeting.rooms');
Route::get('/rooms/meeting-room/{room}', [BookingController::class, 'show'])->name('meeting.room');



// Route::resource('booking', BookingController::class);
Route::get('/booking/{room}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/edit/{id}', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/booking/update/{id}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/delete/{id}', [BookingController::class, 'destroy'])->name('booking.delete');



// Contact page route
Route::view('/contact', 'contact');

// Job routes
Route::resource('jobs', JobController::class);

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });


//                                              AUTHENTICATION
//Register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//Login
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
