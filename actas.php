<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
ini_set('error_reporting', E_ALL);

$aAlumnos = array(array("ID" => 1, "Alumno" => "Juan Perez", "aNotas" =>array(9,8)),
                  array("ID" => 2, "Alumno" => "Ana Valle", "aNotas" =>array(4,9)),
                  array("ID" => 3, "Alumno" => "Gonzalo Roldán", "aNotas" =>array(7,6)));

function promediar($aNotas){
    $sum = 0;
    foreach($aNotas as $nota){
        $sum +=$nota;   
    }
    return $sum/count($aNotas);
}            
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>ID</th>
                        <th>Alumno</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>promedio</th>
                    </tr>
                    <?php 
                    $promedioTotal=0;
                    foreach($aAlumnos as $alumno){
                        $promedio = promediar($alumno["aNotas"]);
                        $promedioTotal += $promedio;

                    ?>
                    <tr>
                        <td><?php echo $alumno["ID"];?></td>
                        <td><?php echo $alumno["Alumno"];?></td>
                        <td><?php echo $alumno["aNotas"][0];?></td>
                        <td><?php echo $alumno["aNotas"][1];?></td>
                        <td><?php echo promediar($alumno["aNotas"]);?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Promedio del curso:<?php echo " ".number_format(($promedioTotal/count($aAlumnos)),2, ".",",");?></p>
            </div>
        </div>
    </main>
</body>
</html>