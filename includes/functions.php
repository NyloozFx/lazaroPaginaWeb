<?php
function limpiarTexto($texto) {
    return htmlspecialchars(trim($texto)); // Elimina espacios y convierte caracteres especiales
}

function redirigir($url) {
    header("Location: $url");
    exit();
}
?>