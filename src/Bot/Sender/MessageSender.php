<?php
namespace Bot\Sender;

use Bot\Entity\Message;

class MessageSender implements Sender
{
    /**
     * @var Sender[]
     */
    private $senders = [];

    public function __construct(array $senders)
    {
        $this->senders = $senders;
    }
    
    public function send(Message $message)
    {
        $platform = $message->getChat()->getPlatform();
        
        if (isset($this->senders[$platform])) {
            $this->senders[$platform]->send($message);
        }
    }
}
