<?php
namespace Bot\Entity;

class Message
{
    private $text;
    private $from;
    private $to;
    private $chat;

    /**
     * @var Image
     */
    private $image;

    /**
     * @var Keyboard
     */
    private $keyboard;

    public function __construct($text = null, $to = null)
    {
        if (gettype($text) === 'string') {
            $this->text = $text;
        } else {
            $to = $text;
        }
        
        if ($to instanceof Chat) {
            $this->setChat($to);
        } elseif ($to instanceof User) {
            $this->setTo($to);
        }
    }

    public function setText(string $text): Message
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText()
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

    public function setChat(Chat $chat): Message
    {
        $this->chat = $chat;

        return $this;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setImage(Image $image)
    {
        $this->image = $image;
        
        return $this;
    }

    /**
     * @return Image|null
     */
    public function getImage()
    {
        return $this->image;
    }

    public function setTo(User $to): Message
    {
        $this->to = $to;
        
        return $this;
    }

    /**
     * @return User|null
     */
    public function getTo()
    {
        return $this->to;
    }

    public function setKeyboard(Keyboard $keyboard): Message
    {
        $this->keyboard = $keyboard;
        
        return $this;
    }

    /**
     * @return Keyboard|null
     */
    public function getKeyboard()
    {
        return $this->keyboard;
    }
}
