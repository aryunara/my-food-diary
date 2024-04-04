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

        $friends = User::whereIn('id', function ($query) {
            $query->select('sender_id')
                ->from('messages')
                ->union(
                    Message::select('recipient_id')
                        ->from('messages')
                );
        })
            ->whereNotIn('id', [$userId])
            ->distinct()
            ->get();

        return view('messages', ['userId' => $userId, 'friends' => $friends]);
    }

    public function getDialog($userId, $friendId)
    {
        $user = Auth::user();

        $friends = User::whereIn('id', function ($query) {
            $query->select('sender_id')
                ->from('messages')
                ->where('sender_id')
                ->union(
                    Message::select('recipient_id')
                        ->from('messages')
                );
        })
            ->whereNotIn('id', [$userId])
            ->distinct()
            ->get();

        $dialog = Message::where(function ($query) use ($friendId) {
            $query->where('sender_id', '=', Auth::id())
                ->orWhere('sender_id', '=', $friendId);
        })->where(function ($query) use ($friendId) {
            $query->where('recipient_id', '=', Auth::id())
                ->orWhere('recipient_id', '=', $friendId);
        })
            ->orderBy('created_at')
            ->get();

        return view('messages', ['userId' => $userId, 'user' => $user, 'dialog' => $dialog, 'friends' => $friends, 'friendId' => $friendId]);
    }

    public function create(Request $request)
    {
        $userId = $request['sender_id'];
        $friendId = $request['recipient_id'];

        Message::create([
            'sender_id' => $request['sender_id'],
            'recipient_id' => $request['recipient_id'],
            'text' => $request['text'],
            'text_changed' => false
        ]);

        return redirect("/dialog/$userId$friendId");
    }
}
