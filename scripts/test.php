<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Bot\Entity\Message;
use Bot\Receiver\TelegramReceiver;
use Bot\Sender\TelegramSender;
use Telegram\Bot\Api;

$telegram = new Api('secret');

$sender = new TelegramSender($telegram);
$receiver = new TelegramReceiver($telegram);

$bot = new \Bot\Bot();

$bot->onMessage(function (Message $message) use ($sender) {
    $response = new Message();
    $response->setText('You say: ' . $message->getText());
    $response->setChat($message->getChat());

    $sender->send($response);
});


foreach ($receiver->getMessages() as $message) {

    $bot->receive($message);

    break;
}

