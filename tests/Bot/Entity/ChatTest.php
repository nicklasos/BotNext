<?php
namespace Bot\Entity;

class ChatTest extends \PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $chat = new Chat();
        $chat->setId(1);

        $this->assertTrue('1' === $chat->getId());
    }

    public function testConstructor()
    {
        $this->assertEquals(1, (new Chat(1))->getId());
    }
}
