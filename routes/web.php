<?php

use App\Http\Controllers\Auth\CustomRegisteredController ;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [PostController::class, 'index'])->name('home');
    Route::get('/create_post', [PostController::class, 'create'])->name('create_post');
    Route::post('/store_default_post', [PostController::class, 'storeDefault'])->name('store_default_post');
    Route::post('/store_form_post', [PostController::class, 'storeForm'])->name('store_form_post');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\Auth\CustomRegisteredUserController;

// Route for custom registration form
Route::get('/custom-register', [CustomRegisteredUserController::class, 'createCustom'])->name('custom.register.form');

// Route for custom registration logic
Route::post('/custom-register', [CustomRegisteredUserController::class, 'storeCustom'])->name('custom.register');



require __DIR__.'/auth.php';
