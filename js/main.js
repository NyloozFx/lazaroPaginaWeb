// Mensaje cuando se hace clic en "Comprar ahora"
function mostrarMensajeCompra() {
    alert("¡Gracias por tu interés! Próximamente más productos.");
}

// Validación básica del formulario de login
function validarLogin() {
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");

    if (usuario.value.trim() === "" || clave.value.trim() === "") {
        alert("Por favor completa todos los campos.");
        return false;
    }

    return true;
}

// Validación básica del formulario de registro
function validarRegistro() {
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");

    if (usuario.value.trim() === "" || clave.value.trim() === "") {
        alert("Todos los campos son obligatorios.");
        return false;
    }

    if (clave.value.length < 4) {
        alert("La contraseña debe tener al menos 4 caracteres.");
        return false;
    }

    return true;
}

// Validación de comentarios
function validarComentario() {
    const comentario = document.getElementById("comentario");

    if (comentario.value.trim() === "") {
        alert("Por favor escribe un comentario antes de enviarlo.");
        return false;
    }

    return true;
}
