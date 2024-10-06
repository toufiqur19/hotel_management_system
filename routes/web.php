<?php

use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// Home
Route::get('/',[HomeController::class,'index'])->name('home');


// User
Route::get('/register',[UserController::class,'register'])->name('register');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/store-data',[UserController::class,'storeData'])->name('storeData');
Route::post('/login-data',[UserController::class,'loginData'])->name('loginData');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

// about
Route::get('/about',[HomeController::class,'about'])->name('about');

// our room
Route::get('/our-room',[HomeController::class,'ourRoom'])->name('our.room');

// gallery
Route::get('/gallery',[HomeController::class,'gallery'])->name('gallery');

// blog
Route::get('/blog',[HomeController::class,'blog'])->name('blog');

// contact
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

// Admin
Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
Route::get('/room',[RoomController::class,'Room'])->name('room');
Route::get('/room-create',[RoomController::class,'roomCreate'])->name('roomCreate');
Route::post('/room-store',[RoomController::class,'roomStore'])->name('roomStore');
Route::get('/room-edit/{id}',[RoomController::class,'roomEdit'])->name('roomEdit');
Route::post('/room-update/{id}',[RoomController::class,'roomUpdate'])->name('roomUpdate');
Route::get('/room-delete/{id}',[RoomController::class,'roomDelete'])->name('roomDelete');