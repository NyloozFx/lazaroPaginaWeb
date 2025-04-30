<?php
// Incluir archivos necesarios
include('../includes/db.php');
include('../includes/functions.php');
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php'); // Redirigir al login si no está logueado
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lázaro</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Ruta al archivo CSS -->
</head>
<body>

    <div class="dashboard-container">

        <!-- Barra de navegación -->
        <nav class="navbar">
            <div class="logo">
                <h1>Lazaro</h1> <!-- Nombre -->
            </div>
            <div class="menu">
                <a href="dashboard.php">Inicio</a>
                <a href="productos.php">Productos</a>
                <a href="comentarios.php">Comentarios</a>
                <a href="logout.php">Cerrar Sesión</a>
            </div>
        </nav>

        <!-- Contenido del Dashboard -->
        <div class="content">
            <h2>Bienvenido(a), <?php echo $_SESSION['usuario']; ?>!</h2>
            <p>Desde aquí puedes visitar los productos, comentarios y otras funciones de la tienda.</p>

            <!-- Sección de información -->
            <div class="info-section">
                <h3>¿Quiénes Somos?</h3>
                <p>Lázaro es una tienda especializada en ropa de alta calidad y estilo único. Creada para ofrecer a los amantes de la moda urbana las mejores tendencias.</p>

                <h3>Nuestra Historia</h3>
                <p>Fundada en 2025, Lázaro comenzó como un proyecto pequeño de un grupo de amigos apasionados por la moda. Con el tiempo, se ha convertido en un referente en el mercado de ropa urbana.</p>

                <h3>El Creador</h3>
                <p>La marca fue creada por Sebastián, un joven con la visión de ofrecer ropa de calidad y diseños exclusivos que conecten con la esencia de la juventud.</p>
            </div>

            <!-- Botones interactivos -->
            <div class="botones">
                <a href="productos.php">Ver Productos</a>
                <a href="comentarios.php">Comentarios</a>
            </div>
        </div>
        
    </div>

</body>
</html>