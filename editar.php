<?php
include_once "conexion.php";

function validarID($id) {
    if (!isset($id) || !is_numeric($id) || $id < 1) {
        return false;
    }
    return true;
}

function obtenerEmpleado($id) {
    global $base_de_datos;
    $sentencia = $base_de_datos->prepare("SELECT nombre, apellido FROM empleados WHERE empleadoid = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
}

if (!validarID($_GET["id"])) {
    header("Location: listar.php");
    exit();
}

$id = $_GET["id"];
$empleado = obtenerEmpleado($id);

if (!$empleado) {
    echo "El empleado no existe.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nuevoNombre = $_POST["nuevoNombre"];
    $nuevoApellido = $_POST["nuevoApellido"];

    try {
        $sentencia = $base_de_datos->prepare("UPDATE empleados SET nombre = ?, apellido = ? WHERE empleadoid = ?");
        $resultado = $sentencia->execute([$nuevoNombre, $nuevoApellido, $id]);

        if ($resultado === true) {
            header("Location: listar.php");
            exit();
        } else {
            echo "Error al actualizar el empleado. Verifica si existen la tabla o los campos.";
        }
    } catch (PDOException $e) {
        echo "Error de la base de datos: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Editar Empleado</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Empleado</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nuevoNombre" value="<?php echo $empleado["nombre"]; ?>">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="nuevoApellido" value="<?php echo $empleado["apellido"]; ?>">
            </div>

            <button type="submit" class="btn btn-success">Guardar cambios</button>
        </form>
    </div>
</body>
</html>



