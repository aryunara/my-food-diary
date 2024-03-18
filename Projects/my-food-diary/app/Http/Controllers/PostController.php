<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Recipe;

class PostController extends Controller
{

    public function index()
    {
        return view('post');
    }

    public function create(PostRequest $request)
    {
        $validated = $request->validated();

        $photo = Photo::create([
            'user_id' => $validated['user_id'],
            'path' => $validated['path'],
        ]);

        if (isset($validated['recipe_name'], $validated['cooking_time'], $validated['recipe_description'])) {
            $recipe = Recipe::create([
                'name' => $validated['recipe_name'],
                'cooking_time' => $validated['cooking_time'],
                'description' => $validated['recipe_description']
            ]);

            Post::create([
                'user_id' => $validated['user_id'],
                'photo_id' => $photo['id'],
                'description' => $validated['description'],
                'recipe_id' => $recipe['id'],
            ]);
        } else {
            Post::create([
                'user_id' => $validated['user_id'],
                'photo_id' => $photo['id'],
                'description' => $validated['description'],
                'recipe_id' => null,
            ]);
        }

        return redirect("/main")->withSuccess('You have created the post');
    }

    public function getPostById($postId)
    {
        $post = Post::find($postId);

        return view('post_info', ['post' => $post]);
    }

}
