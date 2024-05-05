<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindFriendRequest;
use App\Http\Requests\FindUserRequest;
use App\Http\Services\RabbitMQService;
use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FriendController extends Controller
{
    public function index()
    {
        return view('friendlist');
    }

    public function getAll()
    {
        $userId = Auth::id();

        $friends = Friend::where('user_id', $userId)
            ->get();

        if (!$friends->count()) {
            return view('friends', ['friends' => [], 'userId' => $userId]);
        }

        return view('friends', ['friends' => $friends, 'userId' => $userId]);
    }

    public function getFriendList(int $userId)
    {
        $friends = Friend::where('user_id', $userId)
            ->get();

        if (!$friends->count()) {
            return view('friendlist', ['friends' => [], 'userId' => $userId]);
        }

        return view('friendlist', ['friends' => $friends, 'userId' => $userId]);
    }

    public function findFriend(FindFriendRequest $request)
    {
        $data = $request->all();

        $friend = User::where('username', $data['find-friend'])
            ->first();

        return view('friends', ['friend' => $friend, 'userId' => Auth::id()]);
    }

    public function findUser(FindUserRequest $request)
    {
        $data = $request->all();
        $userId = Auth::id();

        $friends = Friend::where('user_id', $userId)
            ->get();

        $user = User::where('username', $data['find-user'])
            ->first();

        if (!isset($user)) {
            return view('friends', ['user' => [], 'friends' => $friends, 'userId' => $userId]);
        }

        $userIsFriend = Friend::where('user_id', $userId)
            ->where('friend_id', $user->id)
            ->get();

        if (FriendRequest::where('sender_id', $userId)
            ->where('receiver_id', $user->id)
            ->where('status', 'created')
            ->get()
            ->count()) {
            $userIsFriend = $user;
        }

        if (!$friends->count()) {
            if ($userIsFriend->count()) {
                return view('friends', ['user' => $user, 'userIsFriend' => true, 'friends' => [], 'userId' => $userId]);
            }
            return view('friends', ['user' => $user, 'userIsFriend' => false, 'friends' => [], 'userId' => $userId]);
        }

        if ($userIsFriend->count()) {
            return view('friends', ['user' => $user, 'userIsFriend' => true, 'friends' => $friends, 'userId' => $userId]);
        }

        return view('friends', ['user' => $user, 'userIsFriend' => false, 'friends' => $friends, 'userId' => $userId]);
    }

    public function create(int $friendId)
    {
        $userId = Auth::id();

        if (Friend::where('user_id', $userId)
            ->where('friend_id', $friendId)
            ->get()
            ->count()) {
            return redirect("/friends");
        }

        FriendRequest::updateOrCreate([
            'sender_id' => $userId,
            'receiver_id' => $friendId,
            'status' => 'created'
        ]);

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->sendMsg('friend_request', $friendId);

        return redirect("/friends")->withSuccess('You have sent friend request');
    }

    public function delete(int $friendId)
    {
        $userId = Auth::id();

        try {
            DB::transaction(function () use ($userId, $friendId) {

                Friend::where('user_id', $userId)
                    ->where('friend_id', $friendId)
                    ->delete();

                Friend::where('user_id', $friendId)
                    ->where('friend_id', $userId)
                    ->delete();
            });

            return redirect("/friends")->withSuccess('You have deleted the friend.');
        } catch(\Exception $exception) {
            Log::error($exception);

            return redirect()->back()->withErrors('Error occurred. The friend have not been deleted.');
        }
    }

}
