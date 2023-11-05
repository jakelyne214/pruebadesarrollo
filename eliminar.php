<?php
    include_once "conexion.php";

    // Verificar si se proporciona un ID válido a través de la URL
    if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location: listar.php"); // Redirigir si no se proporciona un ID válido
        exit();
    }

    // Obtener el ID del empleado a eliminar
    $id = $_GET["id"];

    // Verificar si el registro existe antes de eliminarlo
    $sentencia = $base_de_datos->prepare("SELECT * FROM empleados WHERE empleadoid = ?");
    $sentencia->execute([$id]);
    $empleado = $sentencia->fetch(PDO::FETCH_ASSOC);

    if (!$empleado) {
        echo "El empleado no existe.";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Eliminar el registro de la base de datos
        $sentencia = $base_de_datos->prepare("DELETE FROM empleados WHERE empleadoid = ?");
        $resultado = $sentencia->execute([$id]);

        if ($resultado === true) {
            header("Location: listar.php"); // Redirigir a la página de listado después de la eliminación exitosa
            exit();
        } else {
            echo "Algo salió mal al intentar eliminar el registro.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Empleado</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Empleado</h1>
        <p>¿Estás seguro de que deseas eliminar al empleado <?php echo $empleado["nombre"]; ?>?</p>
        
        <form method="POST">
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
        <a href="listar.php" class="btn btn-warning">Cancelar</a>
    </div>
</body>
</html>

