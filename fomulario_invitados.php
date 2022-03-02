<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
ini_set('error_reporting', E_ALL);


$mensaje=array("mensaje"=>"", "codigo"=>"");
$aInvitados=array("pepe","ana","maca","juan");

if($_POST){
    $nombre = strtolower($_REQUEST["txtNombre"]);
    $clave = trim($_REQUEST["txtCodigo"]);
    if(isset($_REQUEST["btnInvitado"])){
        if(in_array($nombre,$aInvitados)){
            $mensaje = array("mensaje"=>"Bienvenid@ ".$nombre." a la fiesta", "codigo"=>"success");
        }
        else{
            $mensaje = array("mensaje"=>"No se encuentra en la lista de invitados", "codigo"=>"danger");
        }
    }
    else if(isset($_REQUEST["btnCodigo"])){
        if($clave=="verde"){
            $mensaje = array("mensaje"=>"Su código de acceso es ".rand(1000,9999), "codigo"=>"success");
        }
        else{
            $mensaje = array("mensaje"=>"Ud. No tiene pase VIP", "codigo"=>"danger");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Listado de ingreso</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Complete el siguiente formulario:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if(isset($mensaje["mensaje"])&&$mensaje["mensaje"]!=""){
                ?>
                <div class="alert alert-<?php echo $mensaje["codigo"];?>" role="alert">
                    <?php echo $mensaje["mensaje"]; ?>
                </div>
                <?php
                }
                ?>
            </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <div>                
                        <label for="txtNombre" class="pb-3">Nombre:</label>
                    </div>
                    <div>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control">
                    </div>
                    <div>
                        <button id="btnInvitad" name="btnInvitado" type="submit" class="btn-primary">Procesar invitado</button>
                    </div>
                    <div>
                        <label for="txtCodigo" class="py-3">Ingresa el código secreto para el pase VIP:</label>
                    </div>
                    <div>
                        <input type="text" id="txtCodigo" name="txtCodigo" class="form-control">
                    </div>
                    <div>
                        <button id="btnCodigo" name="btnCodigo" type="submit" class="btn-primary">Procesar código</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>