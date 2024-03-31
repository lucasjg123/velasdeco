<?php
function validar() {
    $vMensaje = '';
    $comentario = trim($_POST['comentario']); // Elimina espacios en blanco al principio y al final

    if (strlen($comentario) < 5) {
        $vMensaje = "Debes ingresar al menos 5 caracteres.";
    }

    return $vMensaje;
}


?>