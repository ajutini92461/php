<?php
function print_f($variable){
    $contenido="";
    if(is_array($variable)){
        foreach($variable as $valor){
            $contenido .= $valor;
        }
        file_put_contents("datos.txt", $contenido);
    }
    else{
        file_put_contents("datos.txt", $variable);
    }
}
$aNotas=array(8,4,5,3,9,1);
$msg="Este es un mensaje";
print_f($msg);
print_f($aNotas);
echo "Archivo creado";
?>