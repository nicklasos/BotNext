<?php
namespace Bot\Entity;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $user = new User();
        $user->setExternalId(1);
        $user->setName('Foo');

        $this->assertEquals(1, $user->getExternalId());
        $this->assertEquals('Foo', $user->getName());
    }
}
