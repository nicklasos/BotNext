<?php
namespace Bot\Entity;

class Message
{
    private $text;
    private $from;
    private $chat;

    public function __construct(string $text = null, $to = null)
    {
        $this->text = $text;
        
        if ($to instanceof Chat) {
            $this->setChat($to);
        } elseif ($to instanceof User) {
            $this->setFrom($to);
        }
    }

    public function setText(string $text): Message
    {
        $this->text = $text;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function setFrom(User $from): Message
    {
        $this->from = $from;

        return $this;
    }

    public function setChat(Chat $chat)
    {
        $this->chat = $chat;

        return $this;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }
}
