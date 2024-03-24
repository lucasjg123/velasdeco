<?php 
require_once "conexion.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conexion = ConexionBD(); // busco la conexion
    $cantComentarios = cantComentarios($conexion);

    echo $cantComentarios;
}

function cantComentarios($vConexion){
    $cant;

    $SQL  = "SELECT count(*) cant from comentarios";

    $rs = mysqli_query($vConexion, $SQL);

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $cant = $data["cant"];
        $i++;
    }
    return $cant;
}





?>