<?php
// Archivos necesarios
include('../includes/db.php');
include('../includes/functions.php');

// Iniciar sesión
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $usuario = limpiarTexto($_POST['usuario']);
    $clave = limpiarTexto($_POST['clave']);

    // Verificar si el usuario existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si el usuario existe, obtener los datos
        $row = $result->fetch_assoc();

        // Verificar la contraseña usando password_verify
        if (password_verify($clave, $row['clave'])) {
            // Iniciar sesión, si las contraseñas coinciden
            $_SESSION['usuario'] = $usuario;
            header('Location: dashboard.php');  // Redirigir a la página principal o dashboard
            exit();
        } else {
            $mensaje = "Contraseña incorrecta.";
        }
    } else {
        $mensaje = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Ruta al archivo CSS -->
</head>
<body>

    <div class="form-container">
        <h1>Iniciar Sesión</h1>

        <!-- Mostrar mensajes de error o éxito -->
        <?php if (isset($mensaje)) { echo "<p class='error'>$mensaje</p>"; } ?>

        <!-- Formulario de inicio de sesión -->
        <form action="login.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="clave" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
        </form>

        <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
    </div>

</body>
</html>