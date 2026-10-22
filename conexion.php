<?php
$host = "localhost";
$usuario = "root";
$password = "admin123";
$base_de_datos = "PlataformaArtesanal";
$puerto = "3306";

try {
    $conexion = new PDO("mysql:host=$host;port=$puerto;dbname=$base_de_datos;charset=utf8", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>