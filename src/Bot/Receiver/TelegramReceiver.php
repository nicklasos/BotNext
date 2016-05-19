<?php
namespace Bot\Receiver;

use Bot\Entity\Chat;
use Bot\Entity\Message;
use Bot\Entity\User;
use Bot\Platform;
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
        
        // TODO: move to $this->telegram->getWebhookUpdates();
        foreach ($this->telegram->getUpdates() as $update) {
            $message = new Message($update->getMessage()->getText());
            $message->setFrom(new User());

            $message->setChat(new Chat(
                $update->getMessage()->getChat()->getId(),
                Platform::TELEGRAM
            ));

            $messages[] = $message;
        }

        return $messages;
    }
}