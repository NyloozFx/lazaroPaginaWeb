<?php
$servername = "localhost";
$username = "root";  // Si el usuario no es 'root', cámbielo
$password = "";      // Si tienes una contraseña, colóquela aquí
$dbname = "tienda_ropa"; // Aquí va el nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>