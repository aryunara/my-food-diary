<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getAll()
    {
        $user = Auth::user();
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

        $users = User::all();

        return view('messages', ['user' => $user, 'userId' => $userId, 'friends' => $friends, 'users' => $users]);
    }

    public function getDialog($friendId)
    {
        $userId = Auth::id();
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

        $users = User::all();

        return view('messages', ['user' => $user, 'friends' => $friends, 'friendId' => $friendId, 'users' => $users, 'userId' => $userId]);
    }

    public function getDialogApi($friendId)
    {
        $friendId = (int)$friendId;
        $userId = Auth::id();

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

        return response()->json($dialog);
    }

    public function create(MessageRequest $request)
    {
        $data = $request->all();

        $friendId = $data['recipient_id'];
        $userId = $data['sender_id'];
        $text = $data['text'];

        $message = Message::create([
            'sender_id' => $userId,
            'recipient_id' => $friendId,
            'text' => $text,
            'text_changed' => false
        ]);

        return response()->json($message);
    }
}
