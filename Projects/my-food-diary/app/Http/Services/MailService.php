<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send($msg)
    {
        $friendId = (int)$msg->body;
        $friend = User::find($friendId);

        $data = array('name'=>"$friend->username");

        Mail::send('mail', $data, function($message) use ($friend) {
            $message->to("$friend->email", "$friend->username")->subject
            ("You received a friend request.");
            $message->from('my-food-diary@gmail.com','my-food-diary');
        });
    }

    public function sendConfirmationLetter($userId)
    {
        $userId = (int)$userId;
        $user = User::find($userId);
        $data = array('name'=>"$user->username");

        Mail::send('confirmation', $data, function($message) use ($user) {
            $message->to("$user->email", "$user->username")->subject
            ("You have successfully registered on the My-food-diary");
            $message->from('my-food-diary@gmail.com','my-food-diary');
        });
    }

}
