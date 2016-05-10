<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Bot\Entity\Message;
use Bot\Receiver\TelegramReceiver;
use Bot\Sender\TelegramSender;
use Telegram\Bot\Api;

$telegram = new Api('secret');

$receiver = new TelegramReceiver($telegram);
$sender = new TelegramSender($telegram);

foreach ($receiver->getMessages() as $message) {

    $response = new Message();
    $response->setText('You say: ' . $message->getText());
    $response->setChat($message->getChat());

    $sender->send($response);

    break;
}

