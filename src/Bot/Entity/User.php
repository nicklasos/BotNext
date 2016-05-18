<?php
namespace Bot\Entity;

class User
{
    private $name;
    private $externalId;

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
