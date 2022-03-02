<?php
    function calcularAreaRec ($base, $altura){
        return $base*$altura;
    }
    echo "El área es ". calcularAreaRec(100,0.60)."<br>";
    echo "El área es ". calcularAreaRec(800,300);
?>