<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(CommentRequest $request)
    {
        $data = $request->validated();
        $postId = $data['post_id'];

        Comment::create([
            'post_id' => $data['post_id'],
            'commentator_id' => $data['commentator_id'],
            'text' => $data['text']
        ]);

        return redirect("/post/$postId")->withSuccess('Comment created');
    }

    public function getCount($postId)
    {
        $comments = Comment::where('post_id', $postId)
            ->count();

        return response()->json($comments);
    }
}
