<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Ejemplo de formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="GET" action="">
                    <div>
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div>
                        <label for="txtCorreo">Correo:</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-3">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>