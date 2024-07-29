<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    public function index(int $userId)
    {
        return view('about', ['userId' => $userId]);
    }

    public function getQuestionnaire()
    {
        $userId = Auth::id();

        return view('questionnaire', ['userId' => $userId]);
    }

    public function create(UserInfoRequest $request)
    {
        $data = $request->validated();

        if (isset($data['avatar'])) {
            $avatar = $data['avatar'];
            $path = $avatar->store('avatars', 'public');
            $path = asset('storage/' . $path);
        } else {
            $path = null;
        }
        UserInfo::updateOrCreate(
            [
                'user_id' => $data['user_id'],
            ],
            [
                'real_name' => $data['name'],
                'pronouns' => $data['pronouns'],
                'avatar' => $path,
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

        return redirect("/home")->withSuccess('You have sent your information.');
    }

    public function getAvatar($userId)
    {
        $avatar = UserInfo::where('user_id', $userId)
            ->value('avatar');

        if ($avatar !== null) {
            return response()->json($avatar);
        }

        return response()->json(asset('/storage/projectImages/no-avatar.png'));
    }

    public function getUsername($userId)
    {
        $username = User::where('id', $userId)
            ->value('username');

        return response()->json($username);
    }

}
