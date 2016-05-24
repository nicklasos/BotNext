<?php
namespace Bot;

use Bot\Entity\Message;
use Bot\Entity\User;
use TestCase;

class BotTest extends TestCase
{
    public function testOnMessage()
    {
        $bot = new Bot([]);
        
        $receivedMessage = null;
        
        $bot->onMessage(function (Message $message) use (&$receivedMessage) {
            $receivedMessage = $message->getText();
        });
        
        $bot->receive(new Message('Hello'));

        $this->assertEquals($receivedMessage, 'Hello');
    }

    public function testDI()
    {
        $bot = new Bot([]);
        
        $received = false;
        $bot->onMessage(function (User $user) use (&$received) {
            $received = $user != null;
        });
        
        $bot->receive(new Message());

        $this->assertTrue($received);
    }
}
