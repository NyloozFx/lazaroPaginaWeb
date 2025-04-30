<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos en venta</title>
    <link rel="stylesheet" href="../css/productos.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Agregar ancla en el inicio -->
    <div id="inicio"></div>

    <!-- Contenedor de productos -->
    <div class="contenedor-principal">
        <h1>Productos en Venta</h1>

        <div class="grid-productos">
            <?php
            // Conexión a la base de datos
            $conn = mysqli_connect("localhost", "root", "", "tienda_ropa");

            // Verificar conexión
            if (!$conn) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            // Obtener los productos
            $query = "SELECT nombre, precio, imagen FROM productos";
            $result = mysqli_query($conn, $query);

            $count = 0; // Contador para productos

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='producto'>";
                    echo "<img src='../img/" . $row['imagen'] . "' alt='Imagen del producto'>";
                    echo "<h2>" . htmlspecialchars($row['nombre']) . "</h2>";
                    echo "<p>₡" . number_format($row['precio'], 2) . "</p>";
                    echo "</div>";

                    // Si es el segundo producto, coloca el botón debajo
                    $count++;
                    if ($count == 2) {
                        echo "<div class='btn-container'>";
                        echo "<a href='dashboard.php' class='btn-inicio'>Ir al Inicio</a>";
                        echo "</div>";
                    }
                }
            } else {
                echo "<p>No hay productos disponibles.</p>";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>

</body>
</html>
