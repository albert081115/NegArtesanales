<?php
$host = "localhost";
$usuario = "root"; // Usuario por defecto en XAMPP
$password = ""; // En XAMPP la contraseña viene vacía por defecto
$base_de_datos = "PlataformaArtesanal";

try {
    // Creamos la conexión
    $conexion = new PDO("mysql:host=$host;port=3307;dbname=$base_de_datos;charset=utf8", $usuario, $password);
    // Le decimos que nos avise si hay algún error
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Mensaje temporal para comprobar que funciona (luego lo puedes borrar)
    echo "¡Conexión exitosa a la base de datos lista, jefe!";
    
} catch(PDOException $e) {
    // Si algo falla, nos mostrará el error exacto
    echo "Error de conexión: " . $e->getMessage();
}
?>