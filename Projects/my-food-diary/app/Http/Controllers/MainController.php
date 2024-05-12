<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function getPosts(int $userId)
    {
        $posts = Post::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->cursorPaginate(9);

        if (!$posts->count()) {
            return view('main', ['posts' => [], 'userId' => $userId]);
        }

        return view('main', ['posts' => $posts, 'userId' => $userId]);
    }

}
