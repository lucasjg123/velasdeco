<?php

function insertarComentario($vConexion){
    $asd = $_POST['comentario'];
    $convertir = str_replace('"', "'", $asd);

    // Escapar la variable con posible comilla simple para prevenir la inyección SQL
    $convertir = mysqli_real_escape_string($vConexion, $convertir);

    $SQL_Insert="INSERT INTO comentarios(texto) VALUES ('$convertir')";
// {$_POST['comentario']}
    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    $_POST = array();

}

?>