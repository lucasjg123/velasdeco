<?php

function insertarComentario($vConexion){
    //obtengo el comentario desde la var $_POST
    $comentario = $_POST['comentario'];
    //Reemplazo las comillas dobles por simples
    $comentario = str_replace('"', "'", $comentario);

    // Escapar la variable con posible comilla simple para prevenir la inyección SQL
    $comentario = mysqli_real_escape_string($vConexion, $comentario);

    $SQL_Insert="INSERT INTO comentarios(texto) VALUES ('$comentario')";
    
    // Ejecutar la consulta y verificar si hay errores
    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    // Limpiar los datos POST para evitar que se inserten múltiples veces
    $_POST = array();

}

?>