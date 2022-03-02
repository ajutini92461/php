<?php
    $aProductos["nombre"]=array("Smart TV 55\" 4K UHD", "Samsung Galaxy A30 Blanco", "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F","Impresora HP Laser");
    $aProductos["marca"]=array("Hitachi", "Samsung","Surrey", "HP");
    $aProductos["modelo"]=array("554KS20", "Galaxy A30", "553AIQ1201E", "P1102w");
    $aProductos["precio"]=array(58000, 22000, 45000, 20000);
    $aProductos["stock"]=array(60,0,5,12); //también puede ser $aProductos[0]=array("nombre"=>"tv samsung, "precio" => 45000, etc.)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumar total</title>
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
                        <th>Precio</th>
                        <th>stock</th>
                        <th>Acción</th>
                    </tr>
                    <?php
                    $subtotal=0;
                    $contador=-1;
                    while($contador<3){ //también puede ser for($contador=0;$contador<4;$contador++) se puede poner count($aProductos) pero solo con array dentro de array
                        $contador++;
                    ?>
                    <tr>
                        <td><?php echo $aProductos["nombre"][$contador];?></td>
                        <td><?php echo $aProductos["marca"][$contador];?></td>
                        <td><?php echo $aProductos["modelo"][$contador];?></td>
                        <td><?php echo "$ ".$aProductos["precio"][$contador];?></td>
                        <td><?php echo $aProductos["stock"][$contador]>10?"Hay stock":($aProductos["stock"][$contador]>0 && $aProductos["stock"][$contador]<=10? "Poco stock":"Sin stock");?></td>
                        <td><button class="btn btn-primary">Comprar</button></td>
                    </tr>
                    <?php
                    $subtotal+=$aProductos["precio"][$contador];
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-1">
                <h2>El subtotal es: $ <?php echo $subtotal;?></h2>
            </div>
        </div>
    </main>
</body>
</html>