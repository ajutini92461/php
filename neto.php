<?php
    function calcularNeto($bruto){
        return $bruto-($bruto*0.17);
    }
    echo "El sueldo neto es: ".calcularNeto(50000);
?>
