<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
ini_set('error_reporting', E_ALL);

$iva = 0;
$resSinIva = 0;
$resConIva = 0;
$resIvaCantidad = 0;
if($_POST){
    $iva = $_REQUEST["lstIva"];
    $sinIva = $_REQUEST["txtSinIva"];
    $conIva = $_REQUEST["txtConIva"];
    if ($sinIva > 0 && $conIva == ""){
        $resConIva = $sinIva*($iva/100+1);
        $resSinIva = $sinIva;
        $resIvaCantidad = $resConIva - $resSinIva;
    }
    if ($conIva > 0 && $sinIva == ""){
        $resSinIva = $conIva/($iva/100+1);
        $resConIva = $conIva;
        $resIvaCantidad = $resConIva - $resSinIva;
    }
    
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-3">
                <form action="" method="POST">
                    <div class="my-3">
                        <label for="">
                            IVA
                            <select name="lstIva" id="lstIva" class="form-control">
                                <option value="19">19</option>
                                <option value="5">5</option>
                            </select>
                        </label>
                    </div>
                    <div class="my-3">
                        <label for="">
                            Precio sin IVA
                            <input type="text" name="txtSinIva" id="txtSinIva" class="form-control">
                        </label>
                    </div>
                    <div class="my-3">
                        <label for="">
                            Precio con IVA
                            <input type="text" name="txtConIva" id="txtConIva" class="form-control">
                        </label>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">CALCULAR</button>
                    </div>
                </form>
            </div>
            <div class="col-4 my-3">
                <table class="table table-hover border">
                    <tr>
                        <th>IVA:</th>
                        <td><?php echo $iva; ?>%</td>
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <td>$<?php echo $resSinIva; ?></td>
                    </tr>
                    <tr>
                        <th>Precio con IVA:</th>
                        <td>$<?php echo $resConIva; ?></td>
                    </tr>
                    <tr>
                        <th>IVA Cantidad:</th>
                        <td>$<?php echo $resIvaCantidad; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>