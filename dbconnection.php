<?php
$servername = "nombre_del_servidor";
$username = "inventario";
$password = "";
$database = "proyecto-estadia";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
