<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserInfoController;
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

Route::get('/main/{id}', [MainController::class, 'getPosts'])->name('main')->middleware('auth');
Route::get('about/{id}', [UserInfoController::class, 'index'])->name('about')->middleware('auth');
Route::get('post-creation', [PostController::class, 'index'])->name('createPost')->middleware('auth');
Route::post('post-creation', [PostController::class, 'create'])->name('createPost')->middleware('auth');
Route::post('photo', [PhotoController::class, 'create'])->name('createPhoto')->middleware('auth');
Route::get('/post/{id}', [PostController::class, 'getPostById'])->name('getPostInfo')->middleware('auth');
Route::get('/friendlist/{id}', [FriendController::class, 'getFriendList'])->name('friendlist')->middleware('auth');
Route::get('friends', [FriendController::class, 'getAll'])->name('friends')->middleware('auth');
Route::post('/add-friend/{id}', [FriendController::class, 'create'])->name('createFriend')->middleware('auth');
Route::post('/delete-friend/{id}', [FriendController::class, 'delete'])->name('deleteFriend')->middleware('auth');
Route::get('friend-requests', [FriendRequestController::class, 'getAll'])->name('getRequests')->middleware('auth');
Route::post('/request-sent/{id}', [FriendRequestController::class, 'isSent'])->name('isRequestSent')->middleware('auth');
Route::post('/accept-request/{friendId}/{id}', [FriendRequestController::class, 'accept'])->name('acceptRequest')->middleware('auth');
Route::post('/decline-request/{id}', [FriendRequestController::class, 'decline'])->name('declineRequest')->middleware('auth');
Route::post('/cancel-request/{id}', [FriendRequestController::class, 'cancel'])->name('cancelRequest')->middleware('auth');
Route::post('/add-comment', [CommentController::class, 'create'])->name('addComment')->middleware('auth');
Route::post('/like-feed/{id}', [LikeController::class, 'addToFeed'])->name('addOnFeedPage')->middleware('auth');
Route::get('/messages', [MessageController::class, 'getAll'])->name('getMessages')->middleware('auth');
Route::get('/dialog-api/{friendId}', [MessageController::class, 'getDialogApi'])->middleware('auth');
Route::get('/dialog/{friendId}', [MessageController::class, 'getDialog'])->middleware('auth');
Route::post('/send-message', [MessageController::class, 'create'])->middleware('auth');
Route::get('questionnaire', [UserInfoController::class, 'getQuestionnaire'])->middleware('auth');
Route::post('questionnaire', [UserInfoController::class, 'create'])->middleware('auth');
Route::get('support', [SupportController::class, 'index'])->middleware('auth');
Route::post('support', [SupportController::class, 'sendMessage'])->middleware('auth');
Route::get('/home', function () {
    return view('home', ['userId' => \Illuminate\Support\Facades\Auth::id()]);
});

Route::get('send-confirmation/{id}', [SendController::class, 'sendText'])->middleware('auth');

Route::get('/avatar/{id}', [UserInfoController::class, 'getAvatar'])->middleware('auth');
Route::get('/photo/{id}', [PhotoController::class, 'getById'])->middleware('auth');
Route::get('/username/{id}', [UserInfoController::class, 'getUsername'])->middleware('auth');
Route::get('/comments/{id}', [CommentController::class, 'getComments'])->middleware('auth');
Route::get('/feed', [HomeController::class, 'getFeed'])->name('getFeed')->middleware('auth');

Auth::routes();



