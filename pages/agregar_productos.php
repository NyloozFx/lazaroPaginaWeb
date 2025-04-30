<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "tienda_ropa");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    
    // Subir la imagen
    $imagen = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    
    // Subir la imagen al directorio 'img'
    $target_dir = "img/";
    $target_file = $target_dir . basename($imagen);
    move_uploaded_file($imagen_temp, $target_file);
    
    // Insertar en la base de datos
    $query = "INSERT INTO productos (nombre, precio, imagen) VALUES ('$nombre', '$precio', '$imagen')";
    
    if (mysqli_query($conn, $query)) {
        echo "Producto agregado exitosamente.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
</head>
<body>
    <h2>Agregar Nuevo Producto</h2>
    <form action="agregar_producto.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" step="0.01" required><br><br>

        <label for="imagen">Imagen del Producto:</label>
        <input type="file" name="imagen" required><br><br>

        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>