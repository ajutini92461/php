<?php

function promediar($aNotas){
    $sum = 0;
    foreach($aNotas as $nota){
        $sum +=$nota;     
    }
    return $sum/count($aNotas);
}
$aNotas=array(8,4,5,3,9,1);
echo "El promedio es: ".promediar($aNotas);
?>