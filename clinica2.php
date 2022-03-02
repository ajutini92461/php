<?php
$aPacientes = array(
    array("DNI"=> "33.765.012", "Nombre"=>"Ana Acuña", "Edad"=>45, "Peso"=>81.5),
    array("DNI"=> "23.684.385", "Nombre"=>"Gonzalo Bustamante", "Edad"=>66, "Peso"=>79),
    array("DNI"=> "54.253.685", "Nombre"=>"Juan Irraola", "Edad"=>28, "Peso"=>71),
    array("DNI"=> "78.541.254", "Nombre"=>"Beatriz Ocampo", "Edad"=>50, "Peso"=>57.2)
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Listado de pacientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre y Apellido</th>
                        <th>Edad</th>
                        <th>Peso</th>
                    </tr>
                    <?php
                    foreach($aPacientes as $pos => $paciente){
                    ?>
                    <tr>
                        <td><?php echo $paciente["DNI"];?></td>
                        <td><?php echo $paciente["Nombre"];?></td>
                        <td><?php echo $paciente["Edad"];?></td>
                        <td><?php echo $paciente["Peso"];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>