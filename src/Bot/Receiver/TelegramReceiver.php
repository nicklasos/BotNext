<?php
namespace Bot\Receiver;

use Bot\Entity\Message;
use Bot\Entity\User;
use Telegram\Bot\Api;

class TelegramReceiver implements Receiver
{
    /**
     * @var Api
     */
    private $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * @return Message[]
     */
    public function getMessages(): array
    {
        $messages = [];
        foreach ($this->telegram->getUpdates() as $update) {
            $message = new Message($update->getMessage()->getText());
            $message->setFrom(new User());

            $messages[] = $message;
        }

        return $messages;
    }
}