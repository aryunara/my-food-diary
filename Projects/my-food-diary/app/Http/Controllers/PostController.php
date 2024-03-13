<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('post_info');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Post::create([
            'user_id' => $data['user_id'],
            'photo_id' => $data['photo_id'],
            'description' => $data['description'],
            'recipe_id' => $data['recipe_id'],
        ]);
        return redirect("/main")->withSuccess('You have created the post');
    }

    public function getPhoto()
    {
        $userId = Auth::id();
        $photo = Photo::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();

        return view('post', ['photo' => $photo]);
    }

}
