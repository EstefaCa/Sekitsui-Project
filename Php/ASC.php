<?php

$Peso=$_POST['Peso'];
$Altura=$_POST['Altura'];
$Sistema_Peso=$_POST['Sistema_Peso'];
$Sistema_Medida=$_POST['Sistema_Medida'];

if ($Sistema_Peso==1) {
    $TotalPeso=$Peso*0.4536;
        echo $TotalPeso;
} else {
    $TotalPeso=$Peso;
}

switch ($Sistema_Medida) {
    case  ($Sistema_Medida==3):
        $TotalMedida=$Altura*100;
        echo '</br>';
        echo $TotalMedida;
        break;
    
    case ($Sistema_Medida==2):
        $TotalMedida=$Altura*0.3048;
        echo '</br>';
        echo $TotalMedida;
        break;
    
    default:
        $TotalMedida=$Altura;
        break;
}
$ASC=sqrt(($TotalPeso*$TotalMedida)/3600);

echo "La superficie corporal es de $ASC";
?>