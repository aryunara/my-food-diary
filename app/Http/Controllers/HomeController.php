<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeResource;
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
        $friendsIds = Auth::user()->friends()->pluck('friend_id');

        $posts = Post::whereIn('user_id', $friendsIds)
            ->withCount('likes')
            ->withCount('comments')
            ->orderBy('created_at', 'desc')
            ->offset(request('offset', 0))
            ->take(6)
            ->get();

        return response()->json(HomeResource::collection($posts));
    }
}
