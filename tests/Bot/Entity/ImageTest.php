<?php
namespace Bot\Entity;

use TestCase;

class ImageTest extends TestCase
{
    public function testImageStructure()
    {
        $img = new Image('img.jpg');

        $this->assertEquals('img.jpg', $img->getFilePath());
        
        $this->assertNull($img->getCaption());
        $img->setCaption('Image');
        $this->assertEquals('Image', $img->getCaption());
    }
}
