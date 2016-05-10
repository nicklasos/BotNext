<?php
namespace Bot\Entity;

class User
{
    private $name;
    private $externalId;
    private $username;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername($username): User
    {
        $this->username = $username;

        return $this;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    public function setExternalId($externalId): User
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): User
    {
        $this->name = $name;

        return $this;
    }
}
