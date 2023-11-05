<?php
$contraseña = "ronaldo";
$usuario = "postgres";
$nombreBaseDeDatos = "pruebad";
$rutaServidor = "127.0.0.1";
$puerto = "5432";

try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos",$usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión Exitosa.";
} catch (Exception $e){
    echo "ocurrio un error con la base de datos " .$e->getMessage();
}
?>