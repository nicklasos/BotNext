<?php
namespace Bot\Entity;

class Keyboard
{
    private $buttons = [];

    public function __construct(array $buttons = [])
    {
        $this->buttons = $buttons;
    }
    
    public function addButton(string $text)
    {
        $this->buttons[] = $text;
    }

    public function getButtons(): array
    {
        return $this->buttons;
    }
}
