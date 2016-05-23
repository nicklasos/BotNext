<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Bot\{
    Bot,
    Entity\Keyboard,
    Entity\Message,
    Receiver\TelegramReceiver,
    Sender\MessageSender
};

$bot = new Bot();

$bot->onMessage(function (Message $message, MessageSender $sender) {
    $response = new Message('You say: ' . $message->getText());
    $response->setChat($message->getChat());
    $response->setKeyboard(new Keyboard(['Help', 'About']));

    $sender->send($response);
});

$receiver = $bot->getContainer()->get(TelegramReceiver::class);

foreach ($receiver->getMessages() as $message) {

    $bot->receive($message);

}

