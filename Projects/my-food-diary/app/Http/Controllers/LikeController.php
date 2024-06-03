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
}
