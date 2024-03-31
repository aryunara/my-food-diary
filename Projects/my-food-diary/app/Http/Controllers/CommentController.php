<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        $postId = $data['post_id'];

        Comment::create([
            'post_id' => $data['post_id'],
            'commentator_id' => $data['commentator_id'],
            'text' => $data['text']
        ]);

        return redirect("/post/$postId")->withSuccess('Comment created');
    }

}
