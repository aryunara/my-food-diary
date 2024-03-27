<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getFeed()
    {
        $friends = Friend::where('user_id', Auth::id())
            ->get();

        $posts = collect();

        foreach ($friends as $friend) {
            $userId = $friend->user->id;
            $friendPosts = Post::where('user_id', $userId)
                ->get();

            $posts = $posts->merge($friendPosts);
        }

        $sortedPosts = $posts->sortByDesc('created_at');
        $userId = Auth::id();

        return view('home', ['posts' => $sortedPosts, 'userId' => $userId]);
    }
}
