<?php
include('config.php');
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
$userid = $result["message"]["from"]["id"];
$surname = $result["message"]["from"]["last_name"];
$name = $result["message"]["from"]["first_name"];

$keyboard = [["Выложить слот"],["Для ломбардов"],["Мой лот"]];

if (!empty($result['message']['text'])) {
    $reply = "Добро пожаловать в бота!";
    $reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
	if (mb_stripos($text, '/start') !== false) {
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup ]);
        header("HTTP/1.1 200 OK");	

		unset($text);	
    } 
    if (mb_stripos($text, 'Выложить слот') !== false) {
        $stage = "f";
        $reply = "Введите категорию и название вашего лота.\n Примеры: \n  Техника.Смартфон iPhone X\n  Драгметалл.Золото 375 пробы\n  Изделия. Кольцо с бриллиантом\n  Меха.Норковая шуба\n  Авто. BMW X5";
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply ]);
        header("HTTP/1.1 200 OK");	
        

    }
    if  ($result["message"]["text"]) {
        $array = array();
        array_push($array, $text);
        $reply = "Отправьте фотографию предмета на залог"; 
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply ]);
        header("HTTP/1.1 200 OK");	
       // unset($text);

       
    }
    if  ($img) {
        
   
        $file_id = $result[count($result) - 1]['file_id'];
        $response = $telegram->getFile(['file_id' => $file_id]);
        $linktoimg = $response['file_path'];
        $url = 'https://api.telegram.org/file/bot' . $tkn . '/' . $linktoimg . '';
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $url ]);
        var_dump($url);
        header("HTTP/1.1 200 OK");
        array_push($array, $url);
    }
}

