<?php
	include '../Connection/Connection.php';
	$Users_Id = $_POST['Users_Id'];
	$Details_Id = $Users_Id;
	$Users_User = $_POST['Users_User'];
	$Users_Name = $_POST['Users_Name'];
	$Users_Email = $_POST['Users_Email'];
	$Users_Telephone =$_POST['Users_Telephone'];
	$Details_Weight = $_POST['Details_Weight'];
	$Details_Size = $_POST['Details_Size'];
	$Details_Physical_activity = $_POST['Details_Physical_activity'];

	// Actualización de las entidades

	$Sentencia = $Rizer->prepare("UPDATE users SET Users_User = ?, Users_Name = ?, 
												Users_Email = ?, Users_Telephone = ? WHERE Users_Id = ?;");
	$Resultado = $Sentencia->execute([$Users_User,$Users_Name,$Users_Email,$Users_Telephone, $Users_Id]);

	$Sentencia1 = $Rizer->prepare("UPDATE details SET Details_Weight = ?, Details_Size = ?, 
												Details_Physical_activity = ? WHERE Details_Id = ?;");
	$Resultado1 = $Sentencia1->execute([$Details_Weight,$Details_Size,$Details_Physical_activity, $Users_Id]);


$Sentencia = $Rizer->prepare("SELECT * FROM details WHERE Details_Id = $Details_Id;");
$Sentencia->execute();

if ($Sentencia->rowCount()>=1) {
    $fila = $Sentencia->fetch();

    $Details_Size = $fila['Details_Size'];
    $Details_Gender = $fila['Details_Gender'];
    $Details_Weight = $fila['Details_Weight'];
    $Details_Age = $fila['Details_Age'];
}

include ("../Functions/Functions.php");

$Details_Ideal_weight = PesoIdeal($Details_Size,$Details_Gender);
$Details_MCM = MCM($Details_Size,$Details_Weight,$Details_Gender);
$Details_IMC = IMC($Details_Weight,$Details_Size);
$Details_ASC = ASC($Details_Weight,$Details_Size);
$Details_ACT = ACT($Details_Age,$Details_Weight,$Details_Size,$Details_Gender);
$Details_Recommended_calories = Calorias($Details_Gender,$Details_Weight,$Details_Size,$Details_Age);

$Actualizar = $Rizer->prepare("UPDATE details SET Details_IMC = ?, Details_MCM = ?, Details_Ideal_weight = ?, 
                                Details_ASC = ?, Details_ACT = ?, Details_Recommended_calories = ? WHERE Details_Id = ?;");
$Resultado = $Actualizar->execute([$Details_IMC,$Details_MCM,$Details_Ideal_weight,$Details_ASC,$Details_ACT,$Details_Recommended_calories,$Details_Id]);
    
    if ($Resultado === TRUE) {
        echo '<script>location.href="../../USER/pages/Profile/Profile.php";</script>';
		$Rizer = Null;
    }else{
        echo "A parecer se ha presentado un error, revisa tus datos";
    }
 
?>