<?php

$Details_Weight = $_POST['Details_Weight'];
$Weight_System = $_POST['Weight_System'];
$Details_Size = $_POST['Details_Size'];
$Size_System = $_POST['Size_System'];
$Gender = $_POST['Gender'];
$Details_Date_of_birth = $_POST['Details_Date_of_birth'];
$Details_Physical_activity = $_POST['Details_Physical_activity'];
$Users_Active = 1;

// Sistemas de medida kg, cm y género
if ($Weight_System == 1) {
    $Details_Weight = $Details_Weight * 0.4536;
}

switch ($Size_System) {
    case  ($Size_System == 3):
        $Details_Size=$Details_Size*100;
        break;
    
    case ($Size_System == 2):
        $Details_Size=$Details_Size*0.3048;
        break;
    
}

if ($Gender == 1) {
    $Details_Gender = 1;
} else {
    $Details_Gender = 2;
}

// Calcular la edad, sin pedisela al usuario
$Details_Age = new DateTime($Details_Date_of_birth);
$Today = new DateTime();
$Details_Age = $Today->diff($Details_Age);
$Details_Age =$Details_Age->y;

// Insertar los datos a la base de datos

$Details_Id  =  $_SESSION['Users_Id'];
$Sentencia = $Rizer->prepare("INSERT INTO details(Details_Id,Details_Weight,Details_Size,Details_Gender,Details_Date_of_birth,Details_Age,Details_Physical_activity) VALUES (?,?,?,?,?,?,?)");
$Resultado = $Sentencia->execute([$Details_Id,$Details_Weight,$Details_Size,$Details_Gender,$Details_Date_of_birth,$Details_Age,$Details_Physical_activity]);

$Actualizar = $Rizer->prepare("UPDATE users SET Users_Active = ?, Details_Details_Id  = ? WHERE Users_Id = $Details_Id");
$Resultado = $Actualizar->execute([$Users_Active,$Details_Id]);


// Insertar diferentes datos nutricionales según los datos dados por el usuario
$Sentencia = $Rizer->prepare("SELECT * FROM details WHERE Details_Id = $Details_Id;");
$Sentencia->execute();

if ($Sentencia->rowCount()>=1) {
    $fila = $Sentencia->fetch();

    $Details_Size = $fila['Details_Size'];
    $Details_Gender = $fila['Details_Gender'];
    $Details_Weight = $fila['Details_Weight'];
    $Details_Age = $fila['Details_Age'];
}

include ("../../../Persistencia/Functions/Functions.php");

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
        $Rizer = Null;
        echo '<script>location.href="../../index.php";</script>';
    }else{
        echo "A parecer se ha presentado un error, revisa tus datos";
    }

?>