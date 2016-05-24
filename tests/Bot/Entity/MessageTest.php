<?php
namespace Bot\Entity;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $message = new Message();
        
        $chat = new Chat();
        $message->setChat($chat);

        $user = new User();
        $message->setFrom($user);

        $this->assertNull($message->getText());

        $message->setText('Foo');
        $this->assertEquals('Foo', $message->getText());
        
        $this->assertTrue($chat === $message->getChat());
        $this->assertTrue($user === $message->getFrom());


        $this->assertNull($message->getKeyboard());
        $message->setKeyboard(new Keyboard(['Foo', 'Bar']));
        $this->assertEquals(['Foo', 'Bar'], $message->getKeyboard()->getButtons());
    }

    public function testConstructor()
    {
        $this->assertEquals('Foo', (new Message('Foo'))->getText());
    }

    public function testConstructorParams()
    {
        $message = new Message('Hello', new Chat(1));
        $this->assertEquals(1, $message->getChat()->getId());
        
        
        $message = new Message('Hi!', (new User())->setName('Boris'));
        $this->assertEquals('Boris', $message->getTo()->getName());
        
        
        $message = new Message(new Chat(1));
        $this->assertEquals(1, $message->getChat()->getId());

        $message = new Message((new User())->setName('Boris'));
        $this->assertEquals('Boris', $message->getTo()->getName());
    }

    public function testImage()
    {
        $message = new Message();

        $this->assertNull($message->getImage());

        $message->setImage(new Image('img.png'));
        $this->assertEquals('img.png', $message->getImage()->getFilePath());
    }

    public function testMakeResponse()
    {
        $message = new Message(new Chat(2));
        
        $response = $message->makeResponse();

        $this->assertInstanceOf(Message::class, $response);
        $this->assertEquals(2, $response->getChat()->getId());
        
        
        $response = $message->makeResponse('Hi');
        $this->assertEquals('Hi', $response->getText());
    }
}
