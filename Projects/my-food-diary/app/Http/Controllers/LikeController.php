<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function addToFeed(int $postId)
    {
        $likerId = Auth::id();
        $post = Post::findOrFail($postId);

        $isLiked = $post->likes()->where('liker_id', $likerId)->exists();

        if ($isLiked) {
            $post->likes()
                ->where('liker_id', $likerId)
                ->delete();

            return response()->json(false);
        } else {
            $post->likes()->create([
                'liker_id' => $likerId
            ]);

            return response()->json(true);
        }
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

    public function getCount($postId)
    {
        $likes = Like::where('post_id', $postId)
            ->count();

        return response()->json($likes);
    }
}
