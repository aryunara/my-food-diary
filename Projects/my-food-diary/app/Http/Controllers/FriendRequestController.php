<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;

class FriendRequestController extends Controller
{
    public function getAll()
    {
        $userId = Auth::id();

        $received_rs = FriendRequest::where('receiver_id', $userId)
            ->where('status', 'created')
            ->get();

        $sent_rs = FriendRequest::where('sender_id', $userId)
            ->where('status', 'created')
            ->get();

        return view('friend_requests', ['received_rs' => $received_rs, 'sent_rs' => $sent_rs, 'userId' => $userId]);
    }

    public function accept(int $friendId, int $id)
    {
        $userId = Auth::id();

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

        return redirect("/friend-requests");
    }

    public function decline(int $id)
    {
        FriendRequest::find($id)
            ->update(['status' => 'declined']);

        return redirect("/friend-requests");
    }

    public function cancel(int $id)
    {
        FriendRequest::find($id)
            ->update(['status' => 'canceled']);

        return redirect("/friend-requests");
    }
}
