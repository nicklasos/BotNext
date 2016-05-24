<?php
namespace Bot;

use Helpers;
use Telegram\Bot\Api;
use TestCase;

class DITest extends TestCase
{
    use Helpers;
    
    public function testDI()
    {
        $container = $this->getContainer([
            'telegram.secret' => 'secret',
        ]);

        $api = $container->get(Api::class);
        $this->assertInstanceOf(Api::class, $api);
    }
}
