#Bot

###Usage
```php
use Bot\Bot;
use Bot\Entity\Message;
use Bot\Receiver\TelegramReceiver;
use Bot\Sender\MessageSender;

$bot = new Bot();

$bot->onMessage(function (Message $message, MessageSender $sender) {
    $message = new Message('You say: ' . $message->getText());

    $message->setImage(new Image('hello.png'));

    $message->setKeyboard(new Keyboard([
        'Help',
        'Settings',
        'About',
    ]));

    $sender->send($message);
});

$receiver = $bot->getContainer()->get(TelegramReceiver::class);

foreach ($receiver->getMessages() as $message) {

    $bot->receive($message);

}
```