<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\UserCommands;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Commands\UserCommands\SurveyCommand;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

/**
 * Start command
 *
 * Gets executed when a user first starts using the bot.
 */
class StartCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'start';

    /**
     * @var string
     */
    protected $description = 'Start command';

    /**
     * @var string
     */
    protected $usage = '/start';

    /**
     * @var string
     */
    protected $version = '1.1.0';

    /**
     * @var bool
     */
    protected $private_only = true;

    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {
        $text = trim($this->getMessage()->getText(true));

        $update = json_decode($this->update->toJson(), true);

        $data = [
            'chat_id'      => $this->getMessage()->getChat()->getId(),
            'text'         => 'Добро пожаловать! Вам доступны следующие действия:',
            'reply_markup' => new Keyboard(['Выложить слот', 'Для ломбарда']),
        ];
            if ($text === '') {
                $data['text'] = 'Добро пожаловать! Вам доступны следующие действия:';
                
                $result = Request::sendMessage($data);
            }
            elseif ($text === 'Выложить слот') {
                $this->getTelegram()->executeCommand('survey');
            }

     

    }
}