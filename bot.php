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
$chat_id = getMessage()->getChat()->getId();
print_r($chat_id);
//$chat_id = $result["message"]["chat"]["id"];
$img = $result["message"]["photo"];
$name = $result["message"]["from"]["username"];
$keyboard = [["Выложить слот"],["Для ломбардов"],["Мой лот"]];

if($text){
    if ($text == "/start") {
       $reply = "Добро пожаловать в бота!";
       $reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
       $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup ]);
   }elseif ($text == "/help") {
       $reply = "Информация...";
       $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply ]);
    // Название слота
    }elseif ($text == "Выложить слот") {
    $reply = "Введите название слота";
    // Название слота
    $title = $result["message"]["text"];
    $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply ]);
    // Закрепление изображения
    if(isset($title)) {
        $reply = "Закрепите фотографию слота";
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply ]); }
     elseif ($img) {

        $file_id = $result[count($result) - 1]['file_id'];
        $response = $telegram->getFile(['file_id' => $file_id]);
        $linktoimg = $response['file_path'];
        $url = 'https://api.telegram.org/file/bot' . $tkn . '/' . $linktoimg . '';
        //Отправка на почту

    } 
        else {
            // Если это не изображение
            $this->sendMessage($chat_id, "Не понимаю команду! Просто загрузите картинку.");
        
        }
   
   
   

   //    $url = "https://68.media.tumblr.com/6d830b4f2c455f9cb6cd4ebe5011d2b8/tumblr_oj49kevkUz1v4bb1no1_500.jpg";
   //    $telegram->sendPhoto([ 'chat_id' => $chat_id, 'photo' => $url, 'caption' => "Описание." ]);
      
    }elseif ($text == "Для ломбардов") {
 
}elseif ($text == "Мой лот") {

   }else{
       $reply = "По запросу \"<b>".$text."</b>\" ничего не найдено.";
       $telegram->sendMessage([ 'chat_id' => $chat_id, 'parse_mode'=> 'HTML', 'text' => $reply ]);
   }
}else{
   $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение." ]);
}









