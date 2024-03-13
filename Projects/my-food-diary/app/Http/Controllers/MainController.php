<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function about()
    {
        return view('about');
    }

    public function getPosts()
    {
        $userId = Auth::id();
        $posts = Post::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
        $photos = Photo::getPhotosByUserId($userId);

        return view('main', ['posts' => $posts, 'photos' => $photos]);
    }

}
