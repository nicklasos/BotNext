<?php
namespace Bot\Entity;

use Bot\Platform;

class ChatTest extends \PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $chat = new Chat();
        $chat->setId(1);
        $chat->setPlatform(Platform::TELEGRAM);

        $this->assertTrue('1' === $chat->getId());
        $this->assertEquals(Platform::TELEGRAM, $chat->getPlatform());
    }

    public function testConstructor()
    {
        $chat = new Chat(1, Platform::TELEGRAM);
        $this->assertEquals(1, $chat->getId());
        $this->assertEquals(Platform::TELEGRAM, $chat->getPlatform());
    }
}
