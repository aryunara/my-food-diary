<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $userId = Auth::id();

        $user = User::where('username', $data['find-user'])
            ->first();

        $friends = Friend::where('user_id', $userId)
            ->get();

        if (!$friends->count()) {
            return view('friends', ['user' => $user, 'friends' => [], 'userId' => $userId]);
        }

        return view('friends', ['user' => $user, 'friends' => $friends, 'userId' => $userId]);
    }

    public function create($friendId)
    {
        $userId = Auth::id();

        if (Friend::where('user_id', $userId)
            ->where('friend_id', $friendId)
            ->get()
            ->count()) {
            return redirect("/friends");
        }

        FriendRequest::create([
            'sender_id' => $userId,
            'receiver_id' => $friendId,
            'status' => 'created'
        ]);

        $friend = User::find($friendId);
        $user = User::find($userId);

        $data = array('name'=>"$friend->username", 'sender'=>"$user->username");

        Mail::send(['text'=>'mail'], $data, function($message) use ($user, $friend) {
            $message->to("$friend->email", "$friend->username")->subject
            ("You received a friend request.");
            $message->from('my-food-diary@gmail.com','my-food-diary');
        });

        return redirect("/friends")->withSuccess('You have sent friend request');
    }

    public function delete($friendId)
    {
        $userId = Auth::id();

        Friend::where('user_id', $userId)
            ->where('friend_id', $friendId)
            ->delete();

        Friend::where('user_id', $friendId)
            ->where('friend_id', $userId)
            ->delete();

        return redirect("/friends");
    }

}
