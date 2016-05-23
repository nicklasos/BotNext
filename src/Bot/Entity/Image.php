<?php
namespace Bot\Entity;

// TODO: check is file exists
class Image
{
    /**
     * @var string
     */
    private $filePath;
    private $caption;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function setCaption(string $caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return string|null
     */
    public function getCaption()
    {
        return $this->caption;
    }
}
