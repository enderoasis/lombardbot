<?php
include('vendor/autoload.php'); //Подключаем библиотеку
use Telegram\Bot\Api; 

//Устанавливаем токен бота
$telegram = new Api('1277709938:AAF4Bkt4ULyVrxQWp8f0yfHR-2DDSWwC38A'); 
$tkn = "1277709938:AAF4Bkt4ULyVrxQWp8f0yfHR-2DDSWwC38A";
//Передаем в переменную сообщение пользователя
$result = $telegram -> getWebhookUpdates();

//Текст
$text = $result["message"]["text"];
//Уник.идентификатор пользователя

$chat_id = $result["message"]["chat"]["id"];
$img = $result["message"]["photo"];
$name = $result["message"]["from"]["username"];
$keyboard = [["Выложить слот"],["Для ломбардов"],["Мой лот"]];

if (!empty($result['message']['text'])) {
    $reply = "Добро пожаловать в бота!";
    $reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
	if (mb_stripos($text, '/start') !== false) {
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup ]);
 
		unset($text);	
    } 
    if (mb_stripos($text, 'Выложить слот') !== false) {
        $reply = "Введите название вашего лота";
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply ]);
        unset($text);	
        if ($text) {
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => 'ok' ]);

        }   
    }
}

