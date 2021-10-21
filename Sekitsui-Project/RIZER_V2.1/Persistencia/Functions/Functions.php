<?php

//Peso Ideal
function PesoIdeal($Details_Size,$Details_Gender){
    switch ($Details_Gender) {
        case ($Details_Gender == 'Mujer'):
            $PesoIdeal = $Details_Size-100-(($Details_Size-150)/2.5);
            return $PesoIdeal;
            break;
        case ($Details_Gender == 'Hombre'):
            $PesoIdeal= $Details_Size-100-(($Details_Size-150)/4);
            return $PesoIdeal;
            break;
    }
}

//Masa Corporal Magra
function MCM($Details_Size,$Details_Weight,$Details_Gender){
    switch ($Details_Gender) {
        case ($Details_Gender == 'Mujer'):
            $MCM=($Details_Weight*$Details_Weight)/($Details_Size*$Details_Size);
            $MCM=148*$MCM;
            $MCM=(1.07*$Details_Weight)-$MCM;
            return $MCM;
            break;
        
        case ($Details_Gender == 'Hombre'):
            $MCM=($Details_Weight*$Details_Weight)/($Details_Size*$Details_Size);
            $MCM=128*$MCM;
            $MCM=(1.10*$Details_Weight)-$MCM;
            return $MCM;
            break;
    }
}

// Indice de Masa Corporal 
function IMC($Details_Weight,$Details_Size){
    $Details_Size = $Details_Size/100;

    $IMC = ($Details_Weight/($Details_Size*$Details_Size));
    return $IMC;
}

// Área de Superficie Corporal
function ASC($Details_Weight,$Details_Size){
    $ASC = sqrt(($Details_Weight*$Details_Size)/3600);
    return $ASC;
}

// Agua Corporal Total
function ACT($Details_Age,$Details_Weight,$Details_Size,$Details_Gender){
    switch ($Details_Gender) {
        case ($Details_Gender == 'Mujer'):
            $ACT = (0.1069 * $Details_Size) + (0.2466 * $Details_Weight) - 2.097;
            return $ACT;
            break;
        
        case ($Details_Gender == 'Hombre'):
            $ACT = (0.09156 * $Details_Age) + (0.1074 * $Details_Size) + (0.3362 * $Details_Weight);
            return $ACT;
            break;
        
    }
}

// Calorías
function Calorias($Details_Gender,$Details_Weight,$Details_Size,$Details_Age){
    switch ($Details_Gender) {
        case ($Details_Gender == 'Mujer'):
            $Calorias = (10 * $Details_Weight) + (6.25 * $Details_Size) - (5 * $Details_Age) - 161;
            return $Calorias;
            break;
        
        case ($Details_Gender == 'Hombre'):
            $Calorias = (10 * $Details_Weight) + (6.25 * $Details_Size) - (5 * $Details_Age) + 5;
            return $Calorias;
            break;
    }
}


?>