<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;

class FriendRequestController extends Controller
{
    public function getRequests()
    {
        $userId = Auth::id();
        $received_rs = FriendRequest::where('receiver_id', $userId)
            ->get();

        $sent_rs = FriendRequest::where('sender_id', $userId)
            ->get();

        return view('friend_requests', ['received_rs' => $received_rs, 'sent_rs' => $sent_rs]);
    }
}
