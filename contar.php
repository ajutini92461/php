<?php
    $aNotas=array(9,8,9.50,4,7,8,10);
    function contar($aArray){
        $contador = 0;
        foreach($aArray as $num){
            $contador++;
        }
        return $contador;
    }
    echo "Cantidad de notas: ".contar($aNotas);