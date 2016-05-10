<?php
namespace Bot\Receiver;

use Bot\Entity\Message;

interface Receiver
{
    /**
     * @return Message[]
     */
    public function getMessages(): array;
}