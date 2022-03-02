<?php
    $aEmpleados=array(
        array("dni"=>33300123, "nombre" => "David Garcia", "bruto" => 85000.30),
        array("dni"=>40874456, "nombre" => "Ana Del Valle", "bruto" => 90000),
        array("dni"=>67567565, "nombre" => "Andrés Perez", "bruto" => 100000),
        array("dni"=>75744545, "nombre" => "Victoria Luz", "bruto" => 70000),
    );
    function calcularNeto($bruto){
        return $bruto-($bruto*0.17);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Sueldo</th>
                    </tr>
                    <?php
                    $contador = 0;
                    foreach($aEmpleados as $pos => $empleado){
                    ?>
                    <tr>
                        <td><?php echo $empleado["dni"]; ?></td>
                        <td><?php echo mb_strtoupper($empleado["nombre"]); ?></td>
                        <td><?php echo number_format(calcularNeto($empleado["bruto"]),2,",","."); ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Cantidad de empleados activos:<?php echo " ".count($aEmpleados);?></p>
            </div>
        </div>
    </main>
</body>
</html>