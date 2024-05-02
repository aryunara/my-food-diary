<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index($userId)
    {
        return view('about', ['userId' => $userId]);
    }

    public function getQuestionnaire()
    {
        $userId = Auth::id();

        return view('questionnaire', ['userId' => $userId]);
    }

    public function create(Request $request)
    {
        $data = $request->all();

        UserInfo::updateOrCreate(
            ['user_id' => $data['user_id']],
            [
                'real_name' => $data['name'],
                'pronouns' => $data['pronouns'],
                'avatar' => $data['avatar'],
                'goal' => $data['goal'],
                'social1' => $data['social1'],
                'social2' => $data['social2'],
                'social3' => $data['social3'],
                'age' => $data['age'],
                'job' => $data['job'],
                'favorite_food' => $data['fav-food'],
                'least_favorite_food' => $data['least-fav-food']
            ]
        );

        return redirect("/home");
    }

}
