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
        $text = trim($this->getMessage()->getText(true));

        $update = json_decode($this->update->toJson(), true);

        if ($text === 'Выложить слот') {
            $update['message']['text'] = '/survey';
            return (new SurveyCommand($this->telegram, new Update($update)))->preExecute();
        }
        if ($text === 'Для ломбарда') {
            // $update['message']['text'] = '/whoami';
           // return (new WhoamiCommand($this->telegram, new Update($update)))->preExecute();
        }

        return Request::emptyResponse();
    }
}