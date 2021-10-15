<?php
$Users_Id= $_GET["Users_Id"]; 
$N_Password = md5($_POST['N_Password']);
$C_Password = md5($_POST['C_Password']);

if ($N_Password == $C_Password) {
    $Validacion = $Rizer->prepare("SELECT Users_Password FROM users WHERE Users_Id = '$Users_Id'");
    $Validacion->execute();
    $Pass=$Validacion->fetch();
    $O_Password = $Pass['Users_Password'];
        if ($N_Password == $O_Password) {
            echo 'La contraseña es igual a la anterior utilice una nueva.';
        }else{ 
            $Consulta = $Rizer->prepare("UPDATE users SET Users_Password = ? WHERE Users_Id = ?;");
            $Resultado = $Consulta->execute([$N_Password,$Users_Id]);
            header("Location: login.php");
        }
}else{
    Echo 'Los Datos son diferentes.';
}
?>
