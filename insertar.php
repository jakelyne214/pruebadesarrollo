<?php
    if (!isset($_POST["nombre"]) || !isset($_POST["apellido"])) {
        exit();
    }

    include_once "conexion.php";
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    $sentencia = $base_de_datos->prepare("INSERT INTO empleados (nombre, apellido) VALUES (?, ?); ");
    $resultado = $sentencia->execute([$nombre, $apellido]);

    if ($resultado === true) {
        header("Location: listar.php");
    }else {
        echo "Algo salio mal. Verifica si existe la table";
    }
?>