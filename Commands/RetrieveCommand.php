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

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;
use PDO;
/**
 * Start command
 */
class RetrieveCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'retrieve';

    /**
     * @var string
     */
    protected $description = 'Retrieve command';
    protected static $pdo;

    /**
     * @var string
     */
    protected $usage = '/retrieve';

    /**
     * @var string
     */
    protected $version = '1.2.0';

    /**
     * Command execute method
     *
     * @return ServerResponse
     */
    public function execute()
    {
      
    $user = 'lombardb_didar';
    $pass = '7likC9~2';
    $pdo = new PDO('mysql:host=srv-db-plesk01.ps.kz:3306;dbname=lombardb_telegrambot', $user, $pass);

        $sql1 = '
                SELECT `notes`
                FROM `' . conversation . '`
            ';
        $sth = $this->$pdo->prepare($sql1);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        $data = [
            'chat_id'      => $this->getMessage()->getChat()->getId(),
            'text'         => 'Choose something',
            'reply_markup' => new Keyboard(['Выложить слот', 'Для ломбардов']),
        ];
        return Request::sendMessage($result);

        return Request::sendMessage($data);
        
    }
}
