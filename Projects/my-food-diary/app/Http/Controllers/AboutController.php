<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        return view('about', ['userId' => $userId]);
    }

    public function getQuestionnaire()
    {
        $userId = Auth::id();

        return view('questionnaire', ['userId' => $userId]);
    }

}
