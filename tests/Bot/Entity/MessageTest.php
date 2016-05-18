<?php
namespace Bot\Entity;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $message = new Message();
        $message->setText('Foo');
        
        $chat = new Chat();
        $message->setChat($chat);

        $user = new User();
        $message->setFrom($user);

        $this->assertEquals('Foo', $message->getText());
        $this->assertTrue($chat === $message->getChat());
        $this->assertTrue($user === $message->getFrom());
    }

    public function testConstructor()
    {
        $this->assertEquals('Foo', (new Message('Foo'))->getText());
    }
}
