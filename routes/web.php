<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function () {
//     return view('users');
// });

Route::get('/products', [UserController::class, 'products'])->name('product.view');


Route::get('/login', [UserController::class, 'getLogin'])->name('view.login');
Route::post('/login', [UserController::class, 'login'])->name('user.auth');

Route::view('/register',  'register')->name('view.register');
Route::post('/register', [UserController::class, 'register'])->name('user.save');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
