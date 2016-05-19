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

    public function testMultiParamsInConstructor()
    {
        $message = new Message('Hello', new Chat(1));
        $this->assertEquals(1, $message->getChat()->getId());
        
        
        $message = new Message('Hi!', (new User())->setName('Boris'));
        $this->assertEquals('Boris', $message->getFrom()->getName());
    }
}
