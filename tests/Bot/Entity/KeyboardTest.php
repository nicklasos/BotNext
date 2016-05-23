<?php
namespace Bot\Entity;

use TestCase;

class KeyboardTest extends TestCase
{
    public function testButtons()
    {
        $keyboard = new Keyboard();
        $keyboard->addButton('Foo');
        $keyboard->addButton('Bar');

        $this->assertEquals(['Foo', 'Bar'], $keyboard->getButtons());
    }

    public function testConstructor()
    {
        $keyboard = new Keyboard(['Foo', 'Bar', 'Baz']);

        $this->assertEquals(['Foo', 'Bar', 'Baz'], $keyboard->getButtons());
    }
}
