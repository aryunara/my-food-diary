<?php

namespace App\Http\Controllers;

use App\Models\Photo;

class PhotoController extends Controller
{
    public function getById($id)
    {
        $photo = Photo::where('id', $id)
            ->value('path');

        return response()->json($photo);

    }
}
