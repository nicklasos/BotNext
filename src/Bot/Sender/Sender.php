<?php
namespace Bot\Sender;

use Bot\Entity\Message;

interface Sender
{
    public function send(Message $message);
}
