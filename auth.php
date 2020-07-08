<?php
session_start();
$login = $_POST['login'];


 if (isset($login)) {

    $_SESSION['auth'] = $login;
    header("Location: /board.php");
 } else {

 }


?>