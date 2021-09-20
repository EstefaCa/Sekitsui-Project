<?php

$Altura=$_POST['Altura'];
$Sistema_Medida=$_POST['Sistema_Medida'];
$Peso=$_POST['Peso'];
$Sistema_Peso=$_POST['Sistema_Peso'];
$Sexo=$_POST['Sexo'];

if ($Sistema_Peso==1) {
    $TotalPeso=$Peso*0.4536;
        echo $TotalPeso;
} else {
    $TotalPeso=$Peso;
}

switch ($Sistema_Medida) {
    case  ($Sistema_Medida==2):
        $TotalMedida=$Altura*3.281;
        break;
    
    case ($Sistema_Medida==3):
        $TotalMedida=$Altura*100;
        break;
    
    default:
        $TotalMedida=$Altura;
        break;
}
<!-- Masa corporal magra kg (hombre) = [1,10 x peso (kg)] - 128 x {peso (Kg)2 (al cuadrado) / Altura (cm)2 (al cuadrado)}.

Masa corporal magra kg (mujer) = [1,07 x peso (kg)] - 148 x {peso (Kg)2 (al cuadrado) / Altura (cm)]2 (al cuadrado)}. -->

switch ($Sexo) {
    case ($Sexo==1):
        $MCM=[1.07*$TotalPeso]-148*{($TotalPeso*$TotalPeso)/($TotalMedida*$TotalMedida)};
        echo "La masa corporal magra es de $MCM";
        break;
    case ($Sexo==2):
        [1.10*$TotalPeso]-128*{($TotalPeso*$TotalPeso)/($TotalMedida*$TotalMedida)};
        echo "La masa corporal magra es de $MCM";
    break;
}


?>