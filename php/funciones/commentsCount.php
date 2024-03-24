<?php 

function commentsCount($conexion){
    // Consulta SQL para contar los registros en la tabla
    $SQL = "SELECT COUNT(*) AS cant FROM comentarios";

    // Ejecutar la consulta
    $rs = mysqli_query($conexion, $SQL);

    // Verificar si la consulta fue exitosa
    if (!$rs) die("Error al ejecutar la consulta: " . mysqli_error($conexion));

    // Obtener el resultado de la consulta
    $data = mysqli_fetch_assoc($rs);

    // Obtener el conteo de comentarios
    $cant = $data["cant"];

    // Liberar el conjunto de resultados
    mysqli_free_result($rs);

    // Imprimir el resultado
    return $cant; 
}

?>