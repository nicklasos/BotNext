<?php

require dirname(__DIR__) . '/bootstrap.php';

use Bot\{
    Bot,
    Entity\Keyboard,
    Entity\Message,
    Sender\MessageSender
};

$bot = new Bot([
    'telegram.secret' => getenv('TELEGRAM_TEST_SECRET'),
]);

$bot->onMessage(function (Message $message, MessageSender $sender) {
    $response = $message->makeResponse('You say: ' . $message->getText());
    
    $response->setKeyboard(new Keyboard(['Help', 'About']));
    
    $sender->send($response);
});

$bot->receiveTelegramMessages();
