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
            ->join('users', 'friends.friend_id', '=', 'users.id')
            ->select('friends.*', 'users.username as username')
            ->get();

        $users = User::all();

        if (!$friends->count()) {
            return view('friends', ['friends' => [], 'userId' => $userId, 'users' => $users]);
        }

        return view('friends', ['friends' => $friends, 'userId' => $userId, 'users' => $users]);
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

    public function create(int $friendId)
    {
        $userId = Auth::id();

        if (Friend::where('user_id', $userId)
            ->where('friend_id', $friendId)
            ->get()
            ->count()) {
            return response()->json(false);
        }

        FriendRequest::updateOrCreate([
            'sender_id' => $userId,
            'receiver_id' => $friendId,
            'status' => 'created'
        ]);

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->sendMsg('friend_request', $friendId);

        return response()->json(true);
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

            return response()->json(true);
        } catch(\Exception $exception) {
            Log::error($exception);

            return response()->json(false);
        }
    }

}
