<?php
// Iniciar la sesión si aún no está iniciada (esto es importante para un chat sin base de datos)
session_start();

// Verificar si la variable de sesión 'comentarios' existe, si no, crearla como un array vacío
if (!isset($_SESSION['comentarios'])) {
    $_SESSION['comentarios'] = [];
}

// Manejo del comentario enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comentario'], $_POST['nombre'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $comentario = htmlspecialchars($_POST['comentario']);
    $hora = date("H:i");
    $fecha = date("d/m/Y");

    // Agregar el comentario a la variable de sesión
    $_SESSION['comentarios'][] = [
        'nombre' => $nombre,
        'comentario' => $comentario,
        'hora' => $hora,
        'fecha' => $fecha,
    ];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="contenedor-comentarios">
        <h1>Comentarios de los Usuarios</h1>

        <!-- Formulario para agregar comentario -->
        <form action="comentarios.php" method="POST" class="form-comentario">
            <label for="nombre">Tu Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="comentario">Tu Comentario:</label>
            <textarea name="comentario" id="comentario" rows="5" required></textarea>
            <button type="submit">Enviar Comentario</button>
        </form>

        <!-- Mostrar los comentarios -->
        <div class="comentarios">
            <?php
            // Mostrar los comentarios almacenados en la sesión
            if (!empty($_SESSION['comentarios'])) {
                foreach ($_SESSION['comentarios'] as $comentario) {
                    echo "<div class='comentario'>";
                    echo "<p><strong>" . htmlspecialchars($comentario['nombre']) . ":</strong> " . htmlspecialchars($comentario['comentario']) . "</p>";
                    echo "<p><small>" . $comentario['fecha'] . " a las " . $comentario['hora'] . "</small></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay comentarios aún.</p>";
            }
            ?>
        </div>

        <!-- Botón de regreso al inicio -->
        <a href="../pages/dashboard.php" class="btn-regreso">Volver al inicio</a>
    </div>
</body>
</html>
