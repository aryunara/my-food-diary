<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getAll()
    {
        $userId = Auth::id();
        $user = Auth::user();
//
//        $dialogs1 = $user->sent->groupBy('recipient_id');
//        $dialogs2 = $user->received->groupBy('sender_id');

        return view('messages', ['userId' => $userId, 'user' => $user]);
    }

    public function getDialog($id)
    {
        $recipientId = $id;
        $senderId = Auth::id();

        $dialog = Message::where('sender_id', $senderId)
            ->where('recipient_id', $recipientId)
            ->get();
        dd($dialog);

        return view('messages', ['userId' => $senderId, 'dialog' => $dialog]);
    }

    public function create(Request $request)
    {
        Message::create([
            'sender_id' => $request['sender_id'],
            'recipient_id' => $request['recipient_id'],
            'text' => $request['text'],
            'text_changed' => false
        ]);
    }
}
