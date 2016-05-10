<?php
namespace Bot\Sender;

use Bot\Entity\Message;
use Telegram\Bot\Api;

class TelegramSender implements Sender
{
    /**
     * @var Api
     */
    private $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    public function send(Message $message)
    {
        $this->telegram->sendMessage([
            'chat_id' => $message->getChat()->getId(),
            'text' => $message->getText(),
        ]);
    }
}
