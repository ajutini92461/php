<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (file_exists("archivo.txt")) {
    $jsonPersonas = file_get_contents("archivo.txt");
    $aPersonas = json_decode($jsonPersonas, true);
} else {
    $aPersonas = array();
}

$id = isset($_GET["id"]) ? $_GET["id"] : "";
$mensaje = array("mensaje" => "", "codigo" => "");

if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {

    if (file_exists("imagenes/" . $aPersonas[$id]["imagen"])) {
        unlink("imagenes/" . $aPersonas[$id]["imagen"]);
    }
    unset($aPersonas[$id]);
    $jsonPersonas = json_encode($aPersonas);
    file_put_contents("archivo.txt", $jsonPersonas);
    $mensaje = array("mensaje" => "Cliente eliminado correctamente", "codigo" => "danger");
}

if ($_POST) {
    $nombre = trim($_POST["txtNombre"]);
    $dni = trim($_POST["txtDni"]);
    $telefono = trim($_POST["txtTel"]);
    $correo = trim($_POST["txtCorreo"]);


    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        if (isset($aPersonas[$id]["imagen"]) && $aPersonas[$id]["imagen"] != "") {
            if (file_exists("imagenes/" . $aPersonas[$id]["imagen"])) {
                unlink("imagenes/" . $aPersonas[$id]["imagen"]);
            }
        }
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = $_FILES["archivo"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $imagen = "$nombreAleatorio.$extension";

        if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
            move_uploaded_file($archivo_tmp, "imagenes/$imagen");
        }
    } else {
        if ($id >= 0) {
            $imagen = $aPersonas[$id]["imagen"];
        } else {
            $imagen = "";
        }
    }

    if (isset($_GET["id"]) && isset($_GET["id"]) >= 0) {
        $aPersonas [$id] = array("dni"=> $dni, "nombre" => $nombre, "telefono" => $telefono, "correo" => $correo, "imagen" => $imagen);
        $mensaje = array("mensaje" => "Cliente editado correctamente", "codigo" => "success");      
   } else {
        $aPersonas [] = array("dni"=> $dni, "nombre" => $nombre, "telefono" => $telefono, "correo" => $correo, "imagen" => $imagen);
        $mensaje = array("mensaje"=>"Cliente creado correctamente", "codigo" => "primary");                       
   }

    $jsonPersonas = json_encode($aPersonas);
    file_put_contents("archivo.txt", $jsonPersonas);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de clientes</h1>
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
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mt-2">
                        <label for="">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aPersonas[$id]["nombre"]) ? $aPersonas[$id]["nombre"] : ""; ?>">
                    </div>
                    <div class="mt-2">
                        <label for="">DNI: *</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($aPersonas[$id]["dni"]) ? $aPersonas[$id]["dni"] : ""; ?>">
                    </div>
                    <div class="mt-2">
                        <label for="txtTel">Teléfono:</label>
                        <input type="text" name="txtTel" id="txtTel"  class="form-control" value="<?php echo isset($aPersonas[$id]["telefono"])?$aPersonas[$id]["telefono"]:"";?>">
                    </div>
                    <div class="mt-2">
                        <label for="">Correo: *</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aPersonas[$id]["correo"])?$aPersonas[$id]["correo"]:"";?>">
                    </div>
                    <div class="mt-2 file-box">
                        <label for="">Archivo adjunto:</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <i class="d-block mb-2 small">Archivos admitidos: .jpg, .jpeg, .png</i>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php" class="btn btn-danger my-2">Nuevo</a>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border m-4 table-responsive-sm">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    
                    <?php foreach ($aPersonas as $pos => $persona) : ?>
                        <tr class="align-middle">
                            <td class="text-center"><img src="imagenes/<?php echo $persona["imagen"]; ?>" class="img-thumbnail"></td>
                            <td><?php echo $persona["nombre"]; ?></td>
                            <td><?php echo $persona["dni"]; ?></td>
                            <td><?php echo $persona["telefono"]; ?></td>
                            <td><?php echo $persona["correo"]; ?></td>
                            <td class="text-center">
                                <a class="m-2" href="?id=<?php echo $pos; ?>"><i class="fas fa-edit"></i></a>
                                <a class="m-2" href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </main>
</body>

</html>