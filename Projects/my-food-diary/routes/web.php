<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('main', [MainController::class, 'getPosts'])->name('main');
Route::get('about', [MainController::class, 'about'])->name('about');
Route::get('post-creation', [PostController::class, 'index'])->name('createPost');
Route::post('post-creation', [PostController::class, 'create'])->name('createPost');
Route::post('photo', [PhotoController::class, 'create'])->name('createPhoto');
Route::post('post-info', [PostController::class, 'getInfo'])->name('getInfo');

