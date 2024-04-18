<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send($friendId)
    {
        $friend = User::find($friendId);
        $data = array('name'=>"$friend->username");

        Mail::send('mail', $data, function($message) use ($friend) {
            $message->to("$friend->email", "$friend->username")->subject
            ("You received a friend request.");
            $message->from('my-food-diary@gmail.com','my-food-diary');
        });
    }

}
