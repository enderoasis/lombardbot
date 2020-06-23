<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Request;

/**
 * Start command
 *
 * Gets executed when a user first starts using the bot.
 */
class StartCommand extends SystemCommand
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
        $message = $this->getMessage();

        $chat_id = $message->getChat()->getId();
        $user_id = $user->getId();
        $keyboards = [];
        $keyboards[] = new Keyboard(
                ['Выложить слот'],
                ['Кабинет ломбарда'],
                ['Мой слот']
            );
            if ($text === '') {
                $data['text']         = 'Добро пожаловать! Вам доступны следующие действия:';
                
                $data['reply_markup'] = $keyboard;
                $result = Request::sendMessage($data);
            }
            elseif ($text === 'Выложить слот') {
              $this->telegram->executeCommand("/survey");
              //  $data['text'] = file_get_contents(__DIR__ . '/../../other/texts/infrormation.txt');
            //    $result = Request::sendMessage($data);
            }

     

    }
}