<?php
// Проверяем пришел ли файл

$tittle = $_POST['name'];
$category = $_POST['category'];
$email = $_POST['email'];
$description = $_POST['description'];
$user = 'lombardb_didar';
$pass = '7likC9~2';
$db = new PDO('mysql:host=srv-db-plesk01.ps.kz:3306;dbname=lombardb_telegrambot', $user, $pass);
//$sql = "INSERT INTO goods (tittle, category, email, content ) VALUES (?,?,?,?,?)";

if(ISSET($_POST['upload'])){
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $allowed_ext = array("jpeg", "jpg", "gif", "png");
    $exp = explode(".", $file_name);
    $ext = end($exp);
    $path = "upload/".$file_name;
    if(in_array($ext, $allowed_ext)){
        if(move_uploaded_file($file_temp, $path)){
            try{
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `goods`(tittle, category, email, description, image_name, location)  VALUES ('$tittle','$category','$email', '$description','$file_name', '$path')";
                $db->exec($sql);
            }catch(PDOException $e){
                echo $e->getMessage();
            }

            $db = null;
            header( "refresh:5;url=index.php" );
            echo 'Ваш\ лот успешно опубликован. Вы будете перенаправлены на главную страницу через 5 секунд. Если нет, нажмите <a href="index.php">сюда</a>.';

            $_SESSION['status'] = 'Uploaded';
        }
    }}
?>