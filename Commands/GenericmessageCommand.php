<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Commands\UserCommands\SurveyCommand;
//use Longman\TelegramBot\Commands\UserCommands\WhoamiCommand;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Request;

class GenericmessageCommand extends UserCommand
{
    protected $name = 'Genericmessage';
    protected $description = 'Handle generic message';
    protected $version = '1.0.0';

    public function execute()
    {
         //If a conversation is busy, execute the conversation command after handling the message
    $conversation = new Conversation(
        $this->getMessage()->getFrom()->getId(),
        $this->getMessage()->getChat()->getId()
    );
    //Fetch conversation command if it exists and execute it
    if ($conversation->exists() && ($command = $conversation->getCommand())) {
        return $this->telegram->executeCommand($command);
    }
        $text = trim($this->getMessage()->getText(true));

        $update = json_decode($this->update->toJson(), true);

        if ($text === 'Выложить слот') {
            $update['message']['text'] = '/survey';
            return (new SurveyCommand($this->telegram, new Update($update)))->preExecute();
        }
        if ($text === 'Для ломбарда') {
            $update['message']['text'] = '/retrieve';
            return (new RetrieveCommand($this->telegram, new Update($update)))->preExecute();
        }

        return Request::emptyResponse();
    }
}