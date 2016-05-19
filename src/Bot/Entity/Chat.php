<?php
namespace Bot\Entity;

class Chat
{
    private $id;
    private $platform;

    public function __construct(string $id = null, string $platform = null)
    {
        $this->id = $id;
        $this->platform = $platform;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getPlatform(): string 
    {
        return $this->platform;
    }

    public function setPlatform(string $platform)
    {
        $this->platform = $platform;
    }
}