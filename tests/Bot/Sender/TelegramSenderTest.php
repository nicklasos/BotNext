<?php
namespace Bot\Sender;

use Bot\Entity\Chat;
use Bot\Entity\Message;
use Prophecy\Argument;
use Telegram\Bot\Api;
use TestCase;

class TelegramSenderTest extends TestCase
{
    public function testSendMessage()
    {
        $api = $this->prophesize(Api::class);
        
        $api->sendMessage(Argument::any())
            ->willReturn([
                'chat_id' => 'chatId',
                'text' => 'Hi',
            ])->shouldBeCalled();

        $sender = new TelegramSender($api->reveal());
        $sender->send((new Message('Hi'))->setChat(new Chat('chatId')));
    }
}
