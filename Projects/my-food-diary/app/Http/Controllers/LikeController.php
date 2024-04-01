<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create($postId)
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
                'liker_id' => Auth::id(),
            ]);
        }

        return redirect("home");
    }
}
