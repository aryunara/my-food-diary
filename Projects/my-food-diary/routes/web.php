<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendRequestController;
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
Route::get('/post/{id}', [PostController::class, 'getPostById'])->name('getPostInfo');
Route::get('friends', [FriendController::class, 'getAll'])->name('friends');
Route::post('find-user', [FriendController::class, 'findUser'])->name('findUser');
Route::post('find-friend', [FriendController::class, 'findFriend'])->name('findFriend');
Route::get('/add/{id}', [FriendController::class, 'create'])->name('createFriend');
Route::get('/delete/{id}', [FriendController::class, 'delete'])->name('deleteFriend');
Route::get('friend-requests', [FriendRequestController::class, 'getAll'])->name('getRequests');
Route::get('/accept/{friendId}/{id}', [FriendRequestController::class, 'accept'])->name('acceptRequest');
Route::get('/decline/{id}', [FriendRequestController::class, 'decline'])->name('declineRequest');
Route::get('/cancel/{id}', [FriendRequestController::class, 'cancel'])->name('cancelRequest');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'getFeed'])->name('getFeed');
