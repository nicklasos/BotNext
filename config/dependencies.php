<?php

use function DI\{
    object,
    get
};

return [
    Telegram\Bot\Api::class => object()->constructor(get('telegram.secret')),
];
