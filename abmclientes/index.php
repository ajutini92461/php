<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
ini_set('error_reporting', E_ALL);



if(file_exists("archivo.txt")){
    $jsonPersonas = file_get_contents("archivo.txt");
    $aPersonas = json_decode($jsonPersonas, true);
}else{
    $aPersonas = array();
}

$id = isset($_GET["id"])? $_GET["id"]:"";
$mensaje = array("mensaje" => "", "codigo" => "");

if(isset($_GET["do"])&& $_GET["do"]=="eliminar"){
    if(file_exists("imagenes/".$aPersonas[$id]["imagen"])){
        unlink("imagenes/".$aPersonas[$id]["imagen"]);
    }
    unset($aPersonas[$id]);
    $jsonPersonas = json_encode($aPersonas);
    file_put_contents("archivo.txt", $jsonPersonas);
    $mensaje = array("mensaje" => "Cliente eliminado correctamente", "codigo" => "danger");
}

if($_POST){
    $dni = trim($_REQUEST["txtDni"]);
    $nombre = trim($_REQUEST["txtNombre"]);
    $telefono = trim($_REQUEST["txtTel"]);
    $correo = trim( $_REQUEST["txtCorreo"]);
    
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
        if ($id >= 0 && $_REQUEST["do"]== "editar") { /
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
            <div class="col-12 text-center py-5">
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
                <form action="" method="post">
                    <div>
                        <label for="txtDni">DNI: *</label>
                        <input type="text" name="txtDni" id="txtDni" required class="form-control" value="<?php echo isset($aPersonas[$id]["dni"])?$aPersonas[$id]["dni"]:"";?>">
                    </div>
                    <div>
                        <label for="txtNombre">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" required class="form-control" value="<?php echo isset($aPersonas[$id]["nombre"])?$aPersonas[$id]["nombre"]:"";?>">
                    </div>
                    <div>
                        <label for="txtTel">Teléfono:</label>
                        <input type="text" name="txtTel" id="txtTel"  class="form-control" value="<?php echo isset($aPersonas[$id]["telefono"])?$aPersonas[$id]["telefono"]:"";?>">
                    </div>
                    <div>
                        <label for="txtCorreo">Correo:*</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" required class="form-control" value="<?php echo isset($aPersonas[$id]["correo"])?$aPersonas[$id]["correo"]:"";?>">
                    </div>
                    <div>
                        <label for="archivo" class="pt-2">Archivo adjunto:</label>
                        <input type="file" class="pt-2" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small>Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                    <div>
                        <button class="btn btn-primary my-3">Guardar</button>
                        <a href="index.php" class="bg-danger text-white ms-1 my-3 btn">Nuevo</a>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>
                    <?php
                    foreach($aPersonas as $pos =>$persona){
                    ?>
                    <tr>
                        <td><img src="imagenes/<?php echo $persona["imagen"]; ?>" alt="" class="img-thumbnail"></td>
                        <td><?php echo $persona["dni"]; ?></td>
                        <td><?php echo $persona["nombre"]; ?></td>
                        <td><?php echo $persona["telefono"]; ?></td>
                        <td><?php echo $persona["correo"]; ?></td>
                        <td><a href="?id=<?php echo $pos;?>" ><i class="fas fa-edit"></i></a>
                            <a href="?id=<?php echo $pos;?>&do=eliminar"><i class="fas fa-trash-alt"></i></a></td>
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