<?php

namespace App\Http\Controllers;

use App\Jobs\SendTextJob;

class SendController extends Controller
{
    public function sendText(int $userId)
    {
        SendTextJob::dispatch($userId)->onQueue('sendText');

        return redirect("/login");
    }

}
