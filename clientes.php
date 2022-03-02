<?php
    ini_set('display_errors','1');
    ini_set('display_startup_errors','1');
    ini_set('error_reporting', E_ALL);
    
    session_start();

    if(!isset($_SESSION["clientes"])){
        $_SESSION["clientes"]=array();
    }
    //session_destroy();

    if($_POST){
        /*
            $nombre = $_REQUEST["txtNombre"];
            $dni = $_REQUEST["txtDni"];
            $telefono = $_REQUEST["txtTelefono"];
            $edad = $_REQUEST["txtEdad"];
        */
        if(isset($_POST["btnEnviar"])){
        $_SESSION["clientes"][] = array("nombre" => $_REQUEST["txtNombre"], //"nombre" => $nombre
                                        "dni" => $_REQUEST["txtDni"],  // "dni" => $dni
                                        "telefono" => $_REQUEST["txtTelefono"], // "telefono" => $telefono
                                        "edad" => $_REQUEST["txtEdad"]); //"edad" => edad
        } else if(isset($_POST["btnBorrar"])){
            session_destroy();
            $_SESSION["clientes"]=array();
        }
    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Tabla de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <form action="" method="post">
                    <label for="txtNombre" class="pb-2">Nombre:</label><br>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre y Apellido">
                    <label for="txtDni" class="py-2">Cédula:</label><br>
                    <input type="text" name="txtDni" id="txtDni" class="form-control" placeholder="11111111">
                    <label for="txtTelefono" class="py-2">Teléfono:</label><br>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" placeholder="111111111">
                    <label for="txtEdad" class="py-2">Edad:</label><br>
                    <input type="text" name="txtEdad" id="txtEdad" class="form-control" placeholder="99">
                    <button type="submit" class="btn btn-primary mt-2" name="btnEnviar">Enviar</button>
                </form>
            </div>
            <div class="col-6 offset-2">
                <table class="table table-hover border shadow">
                    <tr>
                        <th>Nombre:</th>
                        <th>Cédula:</th>
                        <th>Teléfono:</th>
                        <th>Edad:</th>      
                    </tr>
                    <?php foreach($_SESSION["clientes"] as $cliente){?>
                    <tr>
                        <td><?php echo $cliente ["nombre"];?></td>
                        <td><?php echo $cliente ["dni"];?></td>
                        <td><?php echo $cliente ["telefono"];?></td>
                        <td><?php echo $cliente ["edad"];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <form action="" method="post">
                    <button type="submit" class="btn text-white mt-2 bg-danger" name="btnBorrar">Borrar datos</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>