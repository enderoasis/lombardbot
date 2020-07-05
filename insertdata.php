<?php
// Проверяем пришел ли файл

$tittle = $_POST['tittle'];
$category = $_POST['category'];
$email = $_POST['email'];
$description = $_POST['description'];
$image = file_get_contents( $_FILES['image']['tmp_name'] );
$image = mysql_escape_string( $image );
$user = 'lombardb_didar';
$pass = '7likC9~2';
$db = new PDO('mysql:host=srv-db-plesk01.ps.kz:3306;dbname=lombardb_telegrambot', $user, $pass);
$sql = "INSERT INTO goods (tittle, category, email, content ) VALUES (?,?,?,?,?)";
$stmt= $db->prepare($sql);
$stmt->execute([$tittle, $category, $email, $image, $description]);
 


?>