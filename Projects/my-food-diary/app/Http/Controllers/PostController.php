<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Termwind\Components\Dd;

class PostController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        return view('post', ['userId' => $userId]);
    }

    public function create(PostRequest $request)
    {
        $validated = $request->validated();
        $userId = $validated['user_id'];

        try {
            DB::transaction(function () use ($validated) {
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
            });

            return redirect("/main/$userId")->withSuccess('You have created the post.');
        } catch(\Exception $exception) {
            Log::error($exception);

            return redirect()->back()->withErrors('Error occurred. Post have not been created.');
        }
    }

    public function getPostById(int $postId)
    {
        $post = Post::find($postId);
        $userId = $post->user->id;

        return view('post_info', ['post' => (new PostResource($post))->resolve(), 'userId' => $userId]);
    }
}
