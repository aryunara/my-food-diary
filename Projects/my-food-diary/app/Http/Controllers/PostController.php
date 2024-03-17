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
        return view('post');
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $photo = Photo::create([
            'user_id' => $data['user_id'],
            'path' => $data['path'],
        ]);

        Post::create([
            'user_id' => $data['user_id'],
            'photo_id' => $photo['id'],
            'description' => $data['description'],
            'recipe_id' => $data['recipe_id'],
        ]);

        return redirect("/main")->withSuccess('You have created the post');
    }

    public function getPostById($postId)
    {
        $post = Post::find($postId);

        return view('post_info', ['post' => $post]);
    }

}
