<?php
    date_default_timezone_set('America/Bogota');
    $hr=date("H");
    $min=date("i");
    echo "La hora es ". (($hr>=0 && $hr<=9)? "0$hr":$hr).":".(($min>=0 && $min<=9)? "0$min":$min). " hs <br>";
    for($i=0; $i<60; $i++){
        $min++;
        if($min==60){
            $hr++;
            $min=0;
        }
        if($hr==24){
            $hr=0;
        }
        echo "La hora es ". (($hr>=0 && $hr<=9)? "0$hr":$hr).":".(($min>=0 && $min<=9)? "0$min":$min). " hs <br>";
    }
?>