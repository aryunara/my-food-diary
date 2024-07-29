<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('how are you?');
$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'How are you?'\n";

$channel->close();
$connection->close();

