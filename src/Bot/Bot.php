<?php
namespace Bot;

use Bot\Entity\Message;
use Bot\Receiver\MessageReceiver;
use Bot\Receiver\TelegramReceiver;
use DI\Container;
use DI\ContainerBuilder;

class Bot
{
    private $onMessage;

    /**
     * @var Container
     */
    private $container;

    public function __construct(array $params = [])
    {
        $builder = new ContainerBuilder();

        $builder->addDefinitions(array_dot_flatten(require ROOT . '/config/main.php'));
        $builder->addDefinitions(ROOT . '/config/dependencies.php');
        $builder->addDefinitions(array_dot_flatten($params));

        $this->container = $builder->build();
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

    public function receiveTelegramMessages()
    {
        foreach ($this->container->get(TelegramReceiver::class)->getMessages() as $message) {
            $this->receive($message);

            // TODO: remove
            break;
        }
    }
}
