<?php
session_start();

 if (!isset($_SESSION['auth'])) {

 
header("Location: /login.php");

 }

?>

<?php include 'header.php';?>



<?php include 'body.php';?>



    <?php include 'footer.php';?>
