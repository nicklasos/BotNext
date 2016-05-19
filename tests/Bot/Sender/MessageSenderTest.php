<?php
namespace Bot\Sender;

use Bot\Entity\Chat;
use Bot\Entity\Message;
use Bot\Platform;
use Prophecy\Argument;
use Telegram\Bot\Api;
use TestCase;

class MessageSenderTest extends TestCase
{
    public function testSend()
    {
        $api = $this->prophesize(Api::class);
        $api->sendMessage(Argument::any())->shouldBeCalled();
        
        $facebook = $this->prophesize(FacebookSender::class);
        $facebook->send(Argument::any())->shouldNotBeCalled();

        $sender = new MessageSender([
            Platform::TELEGRAM => new TelegramSender($api->reveal()),
            Platform::FACEBOOK => $facebook->reveal(),
        ]);
        
        $chat = new Chat(1);
        $chat->setPlatform(Platform::TELEGRAM);
        
        $sender->send(new Message('Hi', $chat));
    }
}
