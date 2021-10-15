<?php
include_once 'Connection.php';
$Users_Email = $_POST['Users_Email'];
ECHO  $Users_Email.'<br>';

$consulta=$Rizer->prepare("SELECT * FROM users WHERE Users_Email=:Users_Nickname");
$consulta->bindParam(':Users_Nickname',$Users_Email);
$consulta->execute();
if ($consulta->rowCount()>=1) {
    $fila=$consulta->fetch();
    $Users_Id = $fila['Users_Id'];
    $Users_Name=$fila['Users_Name'];
    $Users_LastName=$fila['Users_LastName'];
}else{
    echo "Error Los Datos No son Correctos.";
}


// $query = $Rizer -> prepare("SELECT Users_Name,Users_Id,Users_LastName FROM users WHERE Users_Email = '$Users_Email' "); 
// $query -> execute(); 
// $results = $query -> fetch();
// $Users_Id = $results['Users_Id'];
// $Users_Name = $results['Users_Name'];
// $Users_LastName = $results['Users_LastName'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com ';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sekitsuiproject@gmail.com';                     //SMTP username
    $mail->Password   = 'Daesmawi10.';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sekitsuiproject@gmail.com', 'Sekitsui');
    $mail->addAddress($Users_Email, $Users_Name.' '.$Users_LastName);     //Add a recipient

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = utf8_decode('Recupere Contraseña.');
    $mail->Body    = utf8_decode('    
    Hola'.' '.$Users_Name.' '.$Users_LastName.'.<br>
    Link para Renovar tu Contraseña :http://localhost/RIZER/USER/pages/samples/Recov_confirm.php?Users_Id='.$Users_Id);
    // $mail->AltBody = '';

    $mail->send();
    // echo 'El mensaje se envió correctamente';
    header('Location: ../../USER/pages/samples/login.php');
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}

?>