<?php
    ini_set('display_erros',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

    for($i=1; $i<=100; $i++){
        echo $i."<br>";
    } //imprime los números de 1 a 100
?>
<br>
<?php
    for($i=2; $i<=100; $i+=2){
        echo $i."<br>";
    } //imprime los números pares de 1 a 100
?>
<br>
<?php
    for($i=2; $i<=100; $i+=2){
        echo $i."<br>";
        if($i==60){
            break;
        } 
    } //imprime los números pares de 1 a 60
?>