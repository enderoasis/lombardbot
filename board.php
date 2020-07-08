<?php
session_start();

 if ($_SESSION['auth'] == 'admin') {

 
header("Location: /login.php");

 }

?>

<?php include 'header.php';?>



<?php include 'body.php';?>



    <?php include 'footer.php';?>
