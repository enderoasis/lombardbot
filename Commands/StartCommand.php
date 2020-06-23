<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Conversation;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Request;

class ExecCommand extends UserCommand
{
    protected $name = 'start';
    protected $description = 'Exec command';
    protected $usage = '/start';
    protected $version = '1.0.0';

    public function execute()
    {
        $message = $this->getMessage();
        $chat    = $message->getChat();
        $chat_id = $chat->getId();
        $user_id = $message->getFrom()->getId();
        $text    = trim($message->getText(true));

        $data = [
            'chat_id' => $chat_id,
        ];
        if ($chat->isGroupChat() || $chat->isSuperGroup()) {
            $data['reply_markup'] = Keyboard::forceReply(['selective' => true]);
        }

        $conversation = new Conversation($user_id, $chat_id, $this->getName());

        if ($text === '') {
            $data['text']         = 'Choose something';
            $data['reply_markup'] = new Keyboard(['Need some help', 'Who am I?']);

            return Request::sendMessage($data);
        }

        $update = json_decode($this->update->toJson(), true);

        if ($text === 'Need some help') {
            $update['message']['text'] = '/help';
            $result = (new HelpCommand($this->telegram, new Update($update)))->preExecute();
        } elseif ($text === 'Who am I?') {
            $update['message']['text'] = '/whoami';
            $result = (new WhoamiCommand($this->telegram, new Update($update)))->preExecute();
        } else {
            $data['text'] = 'Invalid selection...';
            return Request::sendMessage($data);
        }

        $conversation->stop();
        return $result;
    }
}