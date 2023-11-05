<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
</head>
<body>
<div class="row">
    <div class="col-12">
        <h1>Agregar</h1>
        <form action="insertar.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input require name="nombre" type="text" id="nombre" placeholder="Nombre de Empleado" class="form-control">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input require name="apellido" type="text" id="apellido" placeholder="Apellido de Empleado" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="./listar.php" class="btn btn-warning">Ver todas</a>
        </form>
    </div>
</div> 
</body>
</html>
