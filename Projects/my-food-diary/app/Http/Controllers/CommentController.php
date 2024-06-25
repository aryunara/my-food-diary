<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();

        $comment = Comment::create([
            'post_id' => $data['postId'],
            'commentator_id' => Auth::id(),
            'text' => $data['text']
        ]);

        return response()->json($comment);
    }

    public function getComments($postId)
    {
        $comments = Comment::where('post_id', $postId)
            ->get();

        return response()->json($comments);
    }
}
