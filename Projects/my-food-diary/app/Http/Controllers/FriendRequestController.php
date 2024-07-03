<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FriendRequestController extends Controller
{
    public function getAll()
    {
        $userId = Auth::id();

        $received_rs = FriendRequest::where('receiver_id', $userId)
            ->where('status', 'created')
            ->with(['sender' => function($query) {
                $query->select('id', 'username');
            }])
            ->get();

        $sent_rs = FriendRequest::where('sender_id', $userId)
            ->where('status', 'created')
            ->with(['receiver' => function($query) {
                $query->select('id', 'username');
            }])
            ->get();

        return view('friend_requests', ['received_rs' => $received_rs, 'sent_rs' => $sent_rs, 'userId' => $userId]);
    }

    public function isSent(int $friendId)
    {
        $userId = Auth::id();

        $requestExists = FriendRequest::where('sender_id', $userId)
            ->where('receiver_id', $friendId)
            ->where('status', 'created')
            ->exists();

        return response()->json($requestExists);
    }

    public function accept(int $friendId, int $id)
    {
        $userId = Auth::id();

        try {
            DB::transaction(function () use ($userId, $friendId, $id) {
                Friend::create([
                    'user_id' => $userId,
                    'friend_id' => $friendId
                ]);

                Friend::create([
                    'user_id' => $friendId,
                    'friend_id' => $userId
                ]);

                FriendRequest::find($id)
                    ->update(['status' => 'accepted']);
            });

            return response()->json(true);
        } catch(\Exception $exception) {
            Log::error($exception);

            return response()->json(false);
        }
    }

    public function decline(int $id)
    {
        FriendRequest::find($id)
            ->update(['status' => 'declined']);
    }

    public function cancel(int $id)
    {
        FriendRequest::find($id)
            ->update(['status' => 'canceled']);
    }
}
