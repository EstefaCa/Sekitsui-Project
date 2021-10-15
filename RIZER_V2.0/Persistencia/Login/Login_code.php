<?php
$Users_Nickname=$_POST['Users_Nickname'];
$Users_Password=md5($_POST['Users_Password']);

$consulta=$Rizer->prepare("SELECT * FROM users WHERE (Users_Email=:Users_Nickname OR Users_Nickname=:Users_Nickname)
AND Users_Password=:Users_Password");
$consulta->bindParam(':Users_Nickname',$Users_Nickname);
$consulta->bindParam(':Users_Password',$Users_Password);
$consulta->execute();
if ($consulta->rowCount()>=1) {
    session_start();
    $fila=$consulta->fetch();
    $_SESSION['Users_Id']=$fila['Users_Id'];
    $_SESSION['Users_Name']=$fila['Users_Name'];
    $_SESSION['Users_Nickname']=$fila['Users_Nickname'];
    $_SESSION['Users_Email']=$fila['Users_Email'];
    $_SESSION['Roles_Roles_Id']=$fila['Roles_Roles_Id'];
    header("Location: Com_register.php");
    $_SESSION['token']=md5(uniqid(mt_rand(),true));
}else{
    echo "Error Los Datos No son Correctos.";
}
?>