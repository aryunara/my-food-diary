<?php

namespace App\Console\Commands;

use App\Http\Services\MailService;
use App\Http\Services\RabbitMQService;
use Illuminate\Console\Command;

class SendMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rabbitMQService = new RabbitMQService();

        $callback = function ($msg) {
            $mailService = new MailService();
            $mailService->send($msg);
        };

        $rabbitMQService->receiveMsg('friend_request', $callback);
    }
}
