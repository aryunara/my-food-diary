<?php

namespace App\Http\Services;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    public function sendMsg(string $queue, mixed $data)
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();

        $channel->queue_declare($queue, false, false, false, false);

        $msg = new AMQPMessage($data);

        $channel->basic_publish($msg, '', $queue);

        $channel->close();
    }

    public function receiveMsg(string $queue, callable $callback)
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();

        $channel->queue_declare($queue, false, false, false, false);

        $channel->basic_consume($queue, '', false, true, false, false, $callback);

        try {
            $channel->consume();
        } catch (\Throwable $exception) {
            echo $exception->getMessage();
        }

        $channel->close();
        $connection->close();
    }

}
