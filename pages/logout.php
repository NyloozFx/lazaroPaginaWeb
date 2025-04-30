<?php
session_start();


session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al login con un mensaje
header('Location: login.php?mensaje=Sesion_cerrada');
exit();
?>