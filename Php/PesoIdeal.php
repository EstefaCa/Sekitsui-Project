<?php

$Edad=$_POST['Edad'];
$Altura=$_POST['Altura'];
$Sistema_Medida=$_POST['Sistema_Medida'];
$Sexo=$_POST['Sexo'];

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

switch ($Sexo) {
    case ($Sexo==1):
        $PesoIdeal= $TotalMedida-100-(($TotalMedida-150)/2.5);
        echo "El peso ideal, para ti es de $PesoIdeal";
        break;
    case ($Sexo==2):
        $PesoIdeal= $TotalMedida-100-(($TotalMedida-150)/4);
        echo "El peso ideal, para ti es de $PesoIdeal";
    break;
}


?>