<?php
namespace Bot\Entity;

class Chat
{
    private $id;

    public function __construct(string $id = null)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }
}