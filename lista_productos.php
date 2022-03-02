<?php
    $aProducto["nombre"]=array("Google Chromecast 3", "Parlante JBL Go 3", "Huawei Band 6");
    $aProducto["marca"]=array("Google", "JBL", "Huawei");
    $aProducto["modelo"]=array("Chromecast tercera generación", "Go 3", "Band 6");
    $aProducto["stock"]=array(6, 50, 0);
    $aProducto["precio"]=array("$ 154,530", "$ 176,345", "$ 284,900");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de productos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                    <tr>
                        <td><?php echo $aProducto ["nombre"][0]; ?></td>
                        <td><?php echo $aProducto ["marca"][0]; ?></td>
                        <td><?php echo $aProducto ["modelo"][0]; ?></td>
                        <td><?php echo $aProducto ["stock"][0]>10?"Hay stock":($aProducto["stock"][0]>0 && $aProducto["stock"][0]<=10? "Poco stock":"Sin stock");?></td>
                        <td><?php echo $aProducto ["precio"][0]; ?></td>
                        <td><button class="btn btn-primary">Comprar</button></td>
                    </tr>
                    <tr>
                        <td><?php echo $aProducto ["nombre"][1]; ?></td>
                        <td><?php echo $aProducto ["marca"][1]; ?></td>
                        <td><?php echo $aProducto ["modelo"][1]; ?></td>
                        <td><?php echo $aProducto ["stock"][1]>10?"Hay stock":($aProducto["stock"][1]>0 && $aProducto["stock"][1]<=10? "Poco stock":"Sin stock");?></td>
                        <td><?php echo $aProducto ["precio"][1]; ?></td>
                        <td><button class="btn btn-primary">Comprar</button></td>
                    </tr>
                    <tr>
                        <td><?php echo $aProducto ["nombre"][2]; ?></td>
                        <td><?php echo $aProducto ["marca"][2]; ?></td>
                        <td><?php echo $aProducto ["modelo"][2]; ?></td>
                        <td><?php echo $aProducto ["stock"][2]>10?"Hay stock":($aProducto["stock"][2]>0 && $aProducto["stock"][2]<=10? "Poco stock":"Sin stock");?></td>
                        <td><?php echo $aProducto ["precio"][2]; ?></td>
                        <td><button class="btn btn-primary">Comprar</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>