<?php
// Проверяем пришел ли файл

$tittle = $_POST['name'];
$category = $_POST['category'];
$email = $_POST['email'];
$description = $_POST['description'];
$user = 'lombardb_didar';
$pass = '7likC9~2';
$db = new PDO('mysql:host=srv-db-plesk01.ps.kz:3306;dbname=lombardb_telegrambot', $user, $pass);

if( !empty( $_FILES['image']['name'] ) ) {
  // Проверяем, что при загрузке не произошло ошибок
  if ( $_FILES['image']['error'] == 0 ) {
    // Если файл загружен успешно, то проверяем - графический ли он
    if( substr($_FILES['image']['type'], 0, 5)=='image' ) {
      // Читаем содержимое файла
      $image = file_get_contents( $_FILES['image']['tmp_name'] );
      // Экранируем специальные символы в содержимом файла
      $image = $db->quote( $image );
      // Формируем запрос на добавление файла в базу данных
      var_dump($tittle);
      $sql = "INSERT INTO goods (tittle, category, email, content ) VALUES (?,?,?,?,?)";
      $stmt= $db->prepare($sql);
      $stmt->execute([$tittle, $category, $email, $image, $description]);
   
    }
  }
}
?>