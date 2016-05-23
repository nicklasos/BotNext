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

$bot->onMessage(function (Message $message, MessageSender $sender) {
    $response = new Message('You say: ' . $message->getText());
    $response->setChat($message->getChat());
    $response->setKeyboard(new Keyboard(['Help', 'About']));
    $response->setImage(new Image('hello.png'));

    $sender->send($response);
});

$receiver = $bot->getContainer()->get(TelegramReceiver::class);

foreach ($receiver->getMessages() as $message) {

    $bot->receive($message);

}


```