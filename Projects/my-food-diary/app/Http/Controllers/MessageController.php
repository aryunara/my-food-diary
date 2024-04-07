<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getAll()
    {
        $userId = Auth::id();

        $friends = User::whereIn('id', function ($query) use ($userId) {
            $query->select('sender_id')
                ->from('messages')
                ->where('recipient_id', $userId)
                ->union(
                    Message::select('recipient_id')
                        ->from('messages')
                        ->where('sender_id', $userId)
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

        $friends = User::whereIn('id', function ($query) use ($userId) {
            $query->select('sender_id')
                ->from('messages')
                ->where('recipient_id', $userId)
                ->union(
                    Message::select('recipient_id')
                        ->from('messages')
                        ->where('sender_id', $userId)
                );
        })
            ->whereNotIn('id', [$userId])
            ->distinct()
            ->get();

        $dialog = Message::where(function ($query) use ($friendId, $userId) {
            $query->where('sender_id', '=', $userId)
                ->orWhere('sender_id', '=', $friendId);
        })
            ->where(function ($query) use ($friendId, $userId) {
            $query->where('recipient_id', '=', $userId)
                ->orWhere('recipient_id', '=', $friendId);
        })
            ->orderBy('created_at')
            ->get();

        return view('messages', ['userId' => $userId, 'user' => $user, 'dialog' => $dialog, 'friends' => $friends, 'friendId' => $friendId]);
    }

    public function create(MessageRequest $request)
    {
        $data = $request->validated();

        $userId = $data['sender_id'];
        $friendId = $data['recipient_id'];

        Message::create([
            'sender_id' => $userId,
            'recipient_id' => $friendId,
            'text' => $data['text'],
            'text_changed' => false
        ]);

        return redirect("/dialog/$userId/$friendId");
    }
}
