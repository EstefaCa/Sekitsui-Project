<?php
$Users_Name=$_POST['Users_Name'];
$Users_Email=$_POST['Users_Email'];
$Users_Nickname=$_POST['Users_Nickname'];
$Users_Password=md5($_POST['Users_Password']);
$Roles_Roles_Id = 1;

$Sentencia = $Rizer->prepare("INSERT INTO users(Users_Name,Users_Email,Users_Nickname,Users_Password,Roles_Roles_Id) VALUES (?,?,?,?,?)");
$Resultado = $Sentencia->execute([$Users_Name,$Users_Email,$Users_Nickname,$Users_Password,$Roles_Roles_Id ]);

    if ($Resultado === TRUE) {
        echo '<script>location.href="login.php";</script>';
        $Rizer= Null;
    }else{
        echo "Error";
    }
?>