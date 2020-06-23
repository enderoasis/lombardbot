#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = '1277709938:AAF4Bkt4ULyVrxQWp8f0yfHR-2DDSWwC38A';
$bot_username = 'SmartPrototype_bot';


use Longman\TelegramBot\Telegram;
use Longman\TelegramBot\TelegramLog;
$mysql_credentials = [
    'host'     => 'srv-db-plesk01.ps.kz',
    'port'     => 3306, // optional
    'user'     => 'lombardb_admin',
    'password' => 'S^r07si0',
    'database' => 'lombardb_storage',
 ];
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Enable MySQL

    $telegram->enableExternalMySql($external_pdo_connection);

    // Handle telegram getUpdates request
    $telegram->handleGetUpdates();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();

}