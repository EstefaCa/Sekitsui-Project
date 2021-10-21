<?php

$Details_Id  =  $_SESSION['Users_Id'];

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

$Actualizar = $Rizer->prepare("UPDATE details SET Details_IMC = ?, Details_MCM = ?, Details_Ideal_weight = ?, 
                                Details_ASC = ?, Details_ACT = ? WHERE Details_Id = ?;");
$Resultado = $Actualizar->execute([$Details_IMC,$Details_MCM,$Details_Ideal_weight,$Details_ASC,$Details_ACT,$Details_Id]);
    
    if ($Resultado === TRUE) {
        echo "Tus resultados se han guardado con éxito";
        $Rizer = Null;
        header('Location: ../Users/User/UpdateProfile.php');
    }else{
        echo "A parecer se ha presentado un error, revisa tus datos";
    }

?>