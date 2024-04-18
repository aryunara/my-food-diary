<?php

namespace App\Http\Services;

require_once './../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    public function sendMsg($friendId)
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();

        $channel->queue_declare('friend_request', false, false, false, false);

        $msg = new AMQPMessage($friendId);
        $channel->basic_publish($msg, '', 'friend_request');

        $channel->close();
    }

    public function receiveMsg()
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();

        $channel->queue_declare('friend_request', false, false, false, false);

        $callback = function ($msg) {
            $mailService = new MailService();
            $mailService->send($msg);
        };

        $channel->basic_consume('friend_request', '', false, true, false, false, $callback);

        try {
            $channel->consume();
        } catch (\Throwable $exception) {
            echo $exception->getMessage();
        }

        $channel->close();
        $connection->close();
    }

}
