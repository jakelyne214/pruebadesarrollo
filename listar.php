<?php
include_once "conexion.php";
$sentencia = $base_de_datos->query("select empleadoid, nombre, apellido from empleados");
$empleados = $sentencia->fetchAll(PDO::FETCH_OBJ); // Obtener los datos como objetos y almacenarlos en $empleados
?>
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
        <h1>Listar con arreglo</h1>
        <br>
        <div class="table-responsive">
            <table border="1" align="center" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($empleados as $emp) { ?>
                        <tr>
                            <td><?php echo $emp->empleadoid ?></td>
                            <td><?php echo $emp->nombre ?></td>
                            <td><?php echo $emp->apellido ?></td>
                            <td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $emp->empleadoid ?>">Editar</a></td>
                            <td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $emp->empleadoid ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>  
</body>
</html>

