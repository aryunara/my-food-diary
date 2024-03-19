<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        return view('friends');
    }

    public function getAll()
    {
        $userId = Auth::id();
        $friends = Friend::where('user_id', $userId)
            ->get();

        return view('friends', ['friends' => $friends]);
    }

    public function findUser(Request $request)
    {
        $data = $request->all();
        $user = User::where('name', $data['find-user'])
            ->first();
        $userId = Auth::id();
        $friends = Friend::where('user_id', $userId)
            ->get();

        return view('friends', ['user' => $user, 'friends' => $friends]);
    }

    public function findFriend(Request $request)
    {
        $data = $request->all();
        $friend = User::where('name', $data['find-friend'])
            ->first();

        return view('friends', ['friend' => $friend]);
    }

}
