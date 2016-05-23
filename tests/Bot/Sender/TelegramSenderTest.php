<?php
namespace Bot\Sender;

use Bot\Entity\Chat;
use Bot\Entity\Image;
use Bot\Entity\Keyboard;
use Bot\Entity\Message;
use Prophecy\Argument;
use Telegram\Bot\Api;

class TelegramSenderTest extends \TestCase
{
    public function testSendMessage()
    {
        $api = $this->prophesize(Api::class);
        
        $api->sendMessage(Argument::any())->shouldBeCalled();

        $sender = new TelegramSender($api->reveal());
        $sender->send((new Message('Hi'))->setChat(new Chat('chatId')));
    }

    public function testSendPhoto()
    {
        $api = $this->prophesize(Api::class);
        
        $api->sendPhoto([
            'chat_id' => 1,
            'photo' => 'img.png',
        ])->shouldBeCalled();
        
        $api->sendMessage()->shouldNotBeCalled();
        
        $sender = new TelegramSender($api->reveal());
        
        $message = new Message(new Chat(1));
        $message->setImage(new Image('img.png'));
            
        $sender->send($message);
    }
    
    public function testSendPhotoWithCaption()
    {
        $api = $this->prophesize(Api::class);

        $api->sendPhoto([
            'chat_id' => 1,
            'caption' => 'Image title',
            'photo' => 'img.png',
        ])->shouldBeCalled();

        $api->sendMessage()->shouldNotBeCalled();

        $sender = new TelegramSender($api->reveal());

        $message = new Message(new Chat(1));

        $image = new Image('img.png');
        $image->setCaption('Image title');
        $message->setImage($image);

        $sender->send($message);
    }

    public function testSendKeyboard()
    {
        $api = $this->prophesize(Api::class);

        $api->sendMessage(['chat_id' => 1, 'reply_markup' => [
            ['Foo'],
            ['Bar'],
        ]])->shouldBeCalled();

        $message = new Message(new Chat(1));
        $message->setKeyboard(new Keyboard(['Foo', 'Bar']));
        
        $sender = new TelegramSender($api->reveal());
        $sender->send($message);
    }
}
