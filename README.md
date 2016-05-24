#Bot

###Usage
```php
use Bot\{
    Bot,
    Entity\Keyboard,
    Entity\Message,
    Entity\Image,
    Receiver\TelegramReceiver,
    Sender\MessageSender
};

$bot = new Bot();

/**
 * Dependency Injection
 * @see http://php-di.org
 */
$bot->onMessage(function (Message $message, MessageSender $sender) {

    // Create message for response

    $response = new Message('You say: ' . $message->getText());
    $response->setChat($message->getChat());

    // or

    $response = new Message('You say: ' . $message->getText(), $message->getChat());

    // or

    $response = $message->makeResponse('You say: ' . $message->getText());


    $response->setKeyboard(new Keyboard(['Help', 'About']));

    $sender->send($response);
});


// Get configured class from DI container
$receiver = $bot->getContainer()->get(TelegramReceiver::class);

// Receive messages from telegram
foreach ($receiver->getMessages() as $message) {
    $bot->receive($message);
}

```