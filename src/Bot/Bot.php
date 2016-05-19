<?php
namespace Bot;

use Bot\Entity\Message;
use DI\Container;
use DI\ContainerBuilder;

class Bot
{
    private $onMessage;

    /**
     * @var Container
     */
    private $container;

    public function __construct()
    {
        $builder = new ContainerBuilder();
        
        // TODO: maybe add some path constant
        $builder->addDefinitions(__DIR__ . "/../../config/main.php");
        $builder->addDefinitions(__DIR__ . "/../../config/dependencies.php");
        $container = $builder->build();
        
        $this->container = $container;
    }

    public function getContainer(): Container
    {
        return $this->container;
    }

    public function onMessage(callable $callback)
    {
        $this->onMessage = $callback;
    }

    public function receive(Message $message)
    {
        $this->container->set(Message::class, $message);
        $this->container->call($this->onMessage);
    }
}
