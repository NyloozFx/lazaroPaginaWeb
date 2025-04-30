<?php
// Incluir archivos necesarios
include('../includes/db.php');
include('../includes/functions.php');

// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $usuario = limpiarTexto($_POST['usuario']);
    $email = limpiarTexto($_POST['email']);
    $clave = $_POST['clave'];
    $clave_confirmada = $_POST['clave_confirmada'];

    // Verificar que las contraseñas coincidan
    if ($clave !== $clave_confirmada) {
        $mensaje = "Las contraseñas no coinciden.";
    } else {
        // Verificar si el usuario o el correo ya existen
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' OR email='$email'";
        $result = $conn->query($sql);

        if ($result === false) {
        } else {
            if ($result->num_rows > 0) {
                $mensaje = "El usuario o correo electrónico ya existe.";
            } else {
                // Encriptar la contraseña antes de guardarla
                $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);

                // Insertar el nuevo usuario
                $sql_insert = "INSERT INTO usuarios (usuario, email, clave) VALUES ('$usuario', '$email', '$clave_encriptada')";
                if ($conn->query($sql_insert) === TRUE) {
                    $mensaje = "Registro exitoso. Puedes iniciar sesión.";
                    header('Location: login.php');  // Redirigir a login
                    exit();
                } else {
                    $mensaje = "Hubo un error al registrar al usuario.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="form-container">
        <h1>Registrarse</h1>

        <!-- Mostrar mensajes de error o éxito -->
        <?php if (isset($mensaje)) { echo "<p class='error'>$mensaje</p>"; } ?>

        <!-- Formulario de registro -->
        <form action="register.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <input type="password" name="clave" placeholder="Contraseña" required>
            <input type="password" name="clave_confirmada" placeholder="Confirmar Contraseña" required>
            <button type="submit">Registrarse</button>
        </form>

        <p>¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a></p>
    </div>

</body>
</html>