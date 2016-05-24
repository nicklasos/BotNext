<?php

use DI\Container;
use Bot\Platform;

use Bot\Sender\{
    MessageSender,
    TelegramSender
};

use function DI\{
    object,
    get
};

return [
    Predis\Client::class => object()->constructorParameter('options', ['prefix' => 'bot:']),
    MessageSender::class => function (Container $c) {
        return new MessageSender([
            Platform::TELEGRAM => $c->get(TelegramSender::class)
        ]);
    },
    Telegram\Bot\Api::class => object()->constructor(get('telegram.secret')),
];
