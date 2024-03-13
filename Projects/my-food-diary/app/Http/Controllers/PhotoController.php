<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();

        $photo = Photo::create([
            'user_id' => $data['user_id'],
            'path' => $data['path'],
        ]);

        return view('post', ['photo' => $photo]);
    }
}
