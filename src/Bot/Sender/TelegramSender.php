<?php
namespace Bot\Sender;

use Bot\Entity\Message;
use Exception;
use LogicException;
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
        try {

            if ($image = $message->getImage()) {
                $params = [
                    'chat_id' => $message->getChat()->getId(),
                    'photo' => $image->getFilePath(),
                ];

                if ($image->getCaption()) {
                    $params['caption'] = $image->getCaption();
                }

                $this->telegram->sendPhoto($params);
            }

            $params = [];

            if ($message->getKeyboard()) {
                $buttons = array_map(function ($button) {
                    return [$button];
                }, $message->getKeyboard()->getButtons());

                $params['reply_markup'] = $this->telegram->replyKeyboardMarkup([
                    'keyboard' => $buttons,
                    'resize_keyboard' => true,
                ]);
            }

            if ($message->getText()) {
                $params['text'] = $message->getText();
            }

            if ($params) {
                $params['chat_id'] = $message->getChat()->getId();
                $this->telegram->sendMessage($params);
            }

        } catch (Exception $e) {
            // TODO: move to monolog
            error_log('Telegram exception: ' . $e->getMessage());
        }
    }
}
