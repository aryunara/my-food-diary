<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function addToFeed($postId)
    {
        $likerId = Auth::id();

        if (Like::where('post_id', $postId)
            ->where('liker_id', $likerId)
            ->get()
            ->count())
        {
            Like::where('post_id', $postId)
                ->where('liker_id', $likerId)
                ->delete();
        } else {
            Like::create([
                'post_id' => $postId,
                'liker_id' => $likerId,
            ]);
        }

        return redirect("/home");
    }

    public function addToPost(int $postId)
    {
        $likerId = Auth::id();

        if (Like::where('post_id', $postId)
            ->where('liker_id', $likerId)
            ->get()
            ->count())
        {
            Like::where('post_id', $postId)
                ->where('liker_id', $likerId)
                ->delete();
        } else {
            Like::create([
                'post_id' => $postId,
                'liker_id' => $likerId,
            ]);
        }

        return redirect("/post/$postId");
    }
}
