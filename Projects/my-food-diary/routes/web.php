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

Route::get('/main/{id}', [MainController::class, 'getPosts'])->name('main')->middleware('auth');
Route::get('about/{id}', [\App\Http\Controllers\UserInfoController::class, 'index'])->name('about')->middleware('auth');
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
Route::get('/accept-request/{friendId}/{id}', [FriendRequestController::class, 'accept'])->name('acceptRequest')->middleware('auth');
Route::get('/decline-request/{id}', [FriendRequestController::class, 'decline'])->name('declineRequest')->middleware('auth');
Route::get('/cancel-request/{id}', [FriendRequestController::class, 'cancel'])->name('cancelRequest')->middleware('auth');
Route::post('/add-comment', [\App\Http\Controllers\CommentController::class, 'create'])->name('addComment')->middleware('auth');
Route::post('/like-feed/{id}', [\App\Http\Controllers\LikeController::class, 'addToFeed'])->name('addOnFeedPage')->middleware('auth');
Route::get('/messages', [\App\Http\Controllers\MessageController::class, 'getAll'])->name('getMessages')->middleware('auth');
Route::get('/dialog-api/{friendId}', [\App\Http\Controllers\MessageController::class, 'getDialogApi'])->middleware('auth');
Route::get('/dialog/{friendId}', [\App\Http\Controllers\MessageController::class, 'getDialog'])->middleware('auth');
Route::post('/send-message', [\App\Http\Controllers\MessageController::class, 'create'])->middleware('auth');
Route::get('questionnaire', [\App\Http\Controllers\UserInfoController::class, 'getQuestionnaire'])->middleware('auth');
Route::post('questionnaire', [\App\Http\Controllers\UserInfoController::class, 'create'])->middleware('auth');
Route::get('support', [\App\Http\Controllers\SupportController::class, 'index'])->middleware('auth');
Route::post('support', [\App\Http\Controllers\SupportController::class, 'sendMessage'])->middleware('auth');
Route::get('/home', function () {
    return view('home', ['userId' => \Illuminate\Support\Facades\Auth::id()]);
});

Route::get('send-confirmation/{id}', [\App\Http\Controllers\SendController::class, 'sendText'])->middleware('auth');

Route::get('/avatar/{id}', [\App\Http\Controllers\UserInfoController::class, 'getAvatar'])->middleware('auth');
Route::get('/photo/{id}', [PhotoController::class, 'getById'])->middleware('auth');
Route::get('/username/{id}', [\App\Http\Controllers\UserInfoController::class, 'getUsername'])->middleware('auth');
Route::get('/comments/{id}', [\App\Http\Controllers\CommentController::class, 'getComments'])->middleware('auth');
Route::get('/feed', [\App\Http\Controllers\HomeController::class, 'getFeed'])->name('getFeed')->middleware('auth');

Auth::routes();



