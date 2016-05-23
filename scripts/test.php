<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Bot\ {
    Bot,
    Entity\Message,
    Receiver\TelegramReceiver,
    Sender\MessageSender
};

$bot = new Bot();

$bot->onMessage(function (Message $message, MessageSender $sender) {
    $sender->send(new Message(
        'You say: ' . $message->getText(),
        $message->getChat()
    ));
});

$receiver = $bot->getContainer()->get(TelegramReceiver::class);

foreach ($receiver->getMessages() as $message) {

    $bot->receive($message);

    break;
}

