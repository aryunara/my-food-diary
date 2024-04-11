<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function getPosts($userId)
    {
        $posts = Post::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        if (!$posts->count()) {
            return view('main', ['posts' => [], 'userId' => $userId]);
        }

        return view('main', ['posts' => $posts, 'userId' => $userId]);
    }

}
