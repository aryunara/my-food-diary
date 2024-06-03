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

Route::get('/main/{id}', [MainController::class, 'getPosts'])->name('main');
Route::get('about/{id}', [\App\Http\Controllers\UserInfoController::class, 'index'])->name('about');
Route::get('post-creation', [PostController::class, 'index'])->name('createPost');
Route::post('post-creation', [PostController::class, 'create'])->name('createPost');
Route::post('photo', [PhotoController::class, 'create'])->name('createPhoto');
Route::get('/post/{id}', [PostController::class, 'getPostById'])->name('getPostInfo');
Route::get('/friendlist/{id}', [FriendController::class, 'getFriendList'])->name('friendlist');
Route::get('friends', [FriendController::class, 'getAll'])->name('friends');
Route::post('find-user', [FriendController::class, 'findUser'])->name('findUser');
Route::post('find-friend', [FriendController::class, 'findFriend'])->name('findFriend');
Route::get('/add/{id}', [FriendController::class, 'create'])->name('createFriend');
Route::get('/delete/{id}', [FriendController::class, 'delete'])->name('deleteFriend');
Route::get('friend-requests', [FriendRequestController::class, 'getAll'])->name('getRequests');
Route::get('/accept/{friendId}/{id}', [FriendRequestController::class, 'accept'])->name('acceptRequest');
Route::get('/decline/{id}', [FriendRequestController::class, 'decline'])->name('declineRequest');
Route::get('/cancel/{id}', [FriendRequestController::class, 'cancel'])->name('cancelRequest');
Route::post('/add-comment', [\App\Http\Controllers\CommentController::class, 'create'])->name('addComment');
Route::post('/like-feed/{id}', [\App\Http\Controllers\LikeController::class, 'addToFeed'])->name('addOnFeedPage');
Route::get('/messages', [\App\Http\Controllers\MessageController::class, 'getAll'])->name('getMessages');
Route::get('/dialog/{friendId}', [\App\Http\Controllers\MessageController::class, 'getDialog']);
Route::post('/send-message', [\App\Http\Controllers\MessageController::class, 'create']);
Route::get('questionnaire', [\App\Http\Controllers\UserInfoController::class, 'getQuestionnaire']);
Route::post('questionnaire', [\App\Http\Controllers\UserInfoController::class, 'create']);
Route::get('support', [\App\Http\Controllers\SupportController::class, 'index']);
Route::post('support', [\App\Http\Controllers\SupportController::class, 'sendMessage']);
Route::get('/home', function () {
    return view('home', ['userId' => \Illuminate\Support\Facades\Auth::id()]);
});

Route::get('send-confirmation/{id}', [\App\Http\Controllers\SendController::class, 'sendText']);

Route::get('/avatar/{id}', [\App\Http\Controllers\UserInfoController::class, 'getAvatar']);
Route::get('/photo/{id}', [PhotoController::class, 'getById']);
Route::get('/username/{id}', [\App\Http\Controllers\UserInfoController::class, 'getUsername']);
Route::get('/comments/{id}', [\App\Http\Controllers\CommentController::class, 'getComments']);
Route::get('/feed', [\App\Http\Controllers\HomeController::class, 'getFeed'])->name('getFeed');

Auth::routes();



