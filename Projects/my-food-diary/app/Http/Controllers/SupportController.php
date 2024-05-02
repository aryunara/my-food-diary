<?php

namespace App\Http\Controllers;

use App\Http\Services\YouGileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        return view('support', ['userId' => $userId]);
    }

    public function sendMessage(Request $request)
    {
        $data = $request->all();

        $userId = $data['user_id'];
        $msg = $data['msg'];

        $supportMsg = new YouGileService(config('YOUGILE_API_TOKEN'), config('YOUGILE_API_URL'));
        $supportMsg->createSupportMessage($userId, 'f0539411-a6c6-4f5d-90aa-c3a20083f7f1', $msg);

        return view('support', ['userId' => $userId]);
    }

}
