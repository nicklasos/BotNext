<?php

require dirname(__DIR__) . '/bootstrap.php';

use Bot\{
    Bot,
    Entity\Keyboard,
    Entity\Message,
    Receiver\TelegramReceiver,
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

$receiver = $bot->getContainer()->get(TelegramReceiver::class);

foreach ($receiver->getMessages() as $message) {
    $bot->receive($message);
    break;
}
