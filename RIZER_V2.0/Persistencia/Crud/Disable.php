<?php
    if (!isset($_GET['id'])) {
        exit();
    }
	include '../Connection/Connection.php';
	$Users_Id = $_GET['id'];
	$Users_Active = 0;

	$Sentencia = $Rizer->prepare("UPDATE users SET Users_Active = ? WHERE Users_Id = ?;");
	$Resultado = $Sentencia->execute([$Users_Active,$Users_Id]);

	if ($Resultado === TRUE) {
		header('Location: ../Profile.php');
        $Rizer= Null;
	}else{
		echo "Error";
	}
?>