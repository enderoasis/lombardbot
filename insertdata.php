<?php
require_once 'PHPMailer/PHPMailerAutoload.php';


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



//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'pawn.kzalmaty@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'didar988';

//Set who the message is to be sent from
$mail->setFrom('from@example.com', 'First Last');

//Set an alternative reply-to address
$mail->addReplyTo('pawn.kzalmaty@gmail.com', 'Администрация pawn.kz');

//Set who the message is to be sent to
$mail->addAddress('pawn.kzalmaty@gmail.com', 'pawn.kz');

//Set the subject line
$mail->Subject = 'Новый лот на сайте';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->AltBody = 'На сайте опубликована новая заявка';

//Attach an image file
$mail->addAttachment('. $path .');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}

            }catch(PDOException $e){
                echo $e->getMessage();
            }

            $db = null;
            header( "refresh:3;url=index.php" );
            echo 'Ваш лот успешно опубликован. Вы будете перенаправлены на главную страницу через 3 секунды. Если нет, нажмите <a href="index.php">сюда</a>.';

            $_SESSION['status'] = 'Uploaded';
        }
    }}
?>