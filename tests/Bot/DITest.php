<?php
namespace Bot;

use DI\ContainerBuilder;
use Telegram\Bot\Api;
use TestCase;

class DITest extends TestCase
{
    public function testDI()
    {
        $builder = new ContainerBuilder();

        $builder->addDefinitions(__DIR__ . "/../../config/main.php");
        $builder->addDefinitions(__DIR__ . "/../../config/dependencies.php");
        
        $container = $builder->build();

        $api = $container->get(Api::class);
        $this->assertInstanceOf(Api::class, $api);
    }
}
