<?php

namespace App\Http\Controllers;

use App\Models\Following;
use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getFriendList($userId)
    {
        $friends = Friend::where('user_id', $userId)
            ->get();

        if (!$friends->count()) {
            return view('friendlist', ['friends' => [], 'userId' => $userId]);
        }

        return view('friendlist', ['friends' => $friends, 'userId' => $userId]);
    }

    public function findFriend(Request $request)
    {
        $data = $request->all();
        $friend = User::where('username', $data['find-friend'])
            ->first();

        return view('friends', ['friend' => $friend, 'userId' => Auth::id()]);
    }

    public function findUser(Request $request)
    {
        $data = $request->all();
        $user = User::where('username', $data['find-user'])
            ->first();

        $userId = Auth::id();
        $friends = Friend::where('user_id', $userId)
            ->get();

        if (!$friends->count()) {
            return view('friends', ['user' => $user, 'friends' => [], 'userId' => $userId]);
        }

        return view('friends', ['user' => $user, 'friends' => $friends, 'userId' => $userId]);
    }

    public function create($friendId)
    {
        if (Friend::where('user_id', Auth::id())
            ->where('friend_id', $friendId)
            ->get()
            ->count()) {
            return 'Error';
        }

        FriendRequest::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $friendId,
            'status' => 'created'
        ]);

        return redirect("/friends")->withSuccess('You have sent friend request');
    }

    public function delete($friendId)
    {
        Friend::where('user_id', Auth::id())
            ->where('friend_id', $friendId)
            ->delete();

        Friend::where('user_id', $friendId)
            ->where('friend_id', Auth::id())
            ->delete();

        return redirect("/friends");
    }

}
