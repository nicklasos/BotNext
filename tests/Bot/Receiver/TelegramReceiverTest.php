<?php
namespace Bot\Receiver;

use Bot\Entity\Message;
use Bot\Platform;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Chat;
use Telegram\Bot\Objects\Update;
use TestCase;

class TelegramReceiverTest extends TestCase
{
    public function testReceiveMessages()
    {
        $messages = [
            $this->getMessageMock('message1'),
            $this->getMessageMock('message2'),
        ];

        $api = $this->prophesize(Api::class);
        $api->getUpdates()->willReturn($messages);

        $receiver = new TelegramReceiver($api->reveal());

        $receiveMessages = $receiver->getMessages();

        $this->assertInstanceOf(Message::class, $receiveMessages[0]);
        $this->assertInstanceOf(Message::class, $receiveMessages[1]);

        $this->assertEquals('message1', $receiveMessages[0]->getText());
        $this->assertEquals('message2', $receiveMessages[1]->getText());

        $this->assertEquals(1, $receiveMessages[0]->getChat()->getId());
        $this->assertEquals(Platform::TELEGRAM, $receiveMessages[0]->getChat()->getPlatform());
    }

    public function getMessageMock($text)
    {
        $message = $this->getMockBuilder(\Telegram\Bot\Objects\Message::class)
            ->disableOriginalConstructor()
            ->setMethods(['getText', 'getChat'])
            ->getMock();
        
        $chat = $this->getMockBuilder(Chat::class)
            ->disableOriginalConstructor()
            ->setMethods(['getId'])
            ->getMock();
        
        $chat->method('getId')->will($this->returnValue(1));

        $message->method('getText')->will($this->returnValue($text));
        $message->method('getChat')->will($this->returnValue($chat));

        $update = $this->prophesize(Update::class);
        
        $update->getMessage()->willReturn($message);
            
        return $update->reveal();
    }
}
