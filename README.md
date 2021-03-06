#Bot

###Usage
Create .env file in root folder (you can use example.env as an example)

```php
use Bot\{
    Bot,
    Entity\Keyboard,
    Entity\Message,
    Entity\Image,
    Receiver\TelegramReceiver,
    Sender\MessageSender
};

// You can override any setting from config/main.php and config/dependencies.php
$bot = new Bot([
    'telegram.secret' => getenv('TELEGRAM_TEST_SECRET'),
]);

/**
 * DI
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
    $response->setImage(new Image(ASSETS . '/test/bender.png'));

    $sender->send($response);
});


// Get configured class from DI container
$receiver = $bot->getContainer()->get(TelegramReceiver::class);

// Receive messages from telegram
foreach ($receiver->getMessages() as $message) {
    $bot->receive($message);
}

// or

$bot->receiveTelegramMessages();
```