#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = '1277709938:AAF4Bkt4ULyVrxQWp8f0yfHR-2DDSWwC38A';
$bot_username = 'SmartPrototype_bot';

$mysql_credentials = [
   'host'     => 'srv-db-plesk01.ps.kz:3306',
   'user'     => 'lombardb_admin',
   'password' => 'S^r07si0',
   'database' => 'lombardb_storage',
];
use Longman\TelegramBot\Telegram;
use Longman\TelegramBot\TelegramLog;

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Enable MySQL
    $telegram->enableMySql($mysql_credentials);
    $telegram->addCommandsPath(__DIR__ . "/commands");
	TelegramLog::initUpdateLog($bot_username . '_update.log');

    // Handle telegram getUpdates request
    $telegram->handleGetUpdates();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();

}